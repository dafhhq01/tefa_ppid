<?php

namespace App\Http\Controllers;

use App\Models\InformationRequest;
use App\Models\Complaint;
use App\Models\StatusHistory;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Storage;

class PublicServiceController extends Controller
{
    // Generate ticket number format
    public function generateTicketNumber(string $prefix, string $modelClass): string
    {
        $date = now()->format('Ymd');
        $prefixWithDate = "{$prefix}-{$date}-";


        $lastRecord = $modelClass::where('ticket_number', 'like', '{$prefixWithDate}%')
            ->orderBy('ticket_number', 'desc')
            ->first();

        if (!$lastRecord) {
            $sequence = '0001';
        } else {
            $lastSequence = (int) substr($lastRecord->ticket_number, -4);
            $sequence = str_pad($lastSequence + 1, 4, '0', STR_PAD_LEFT);
        }

        return $prefixWithDate . $sequence;
    }

    public function storeRequest(Request $request)
    {
        // Validasi Input 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'identity_number' => 'required|string|max:50', 
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120', // Maks 5MB
        ]);

        return DB::transaction(function () use ($request, $validated) {
            // Upload file lampiran (kalo ada)
            $attachmentPath = null;
            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('attachments/requests', 'public');
            }

            // Generate Nomor Tiket
            $ticketNumber = $this->generateTicketNumber('REQ', InformationRequest::class);

            // Simpan ke database information_requests
            $infoRequest = InformationRequest::create([
                'ticket_number' => $ticketNumber,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'identity_number' => $validated['identity_number'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'attachment' => $attachmentPath,
                'status' => 'pending',
            ]);

            // Buat riwayat status (pending)
            StatusHistory::create([
                'request_id' => $infoRequest->id,
                'status' => 'pending',
                'note' => 'Permohonan berhasil dikirim oleh masyarakat dan sedang menunggu verifikasi awal.',
                'changed_by' => null, 
            ]);

            // Return response ke halaman sukses FE5 atau return JSON bebas
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Permohonan informasi berhasil dikirim.',
                    'ticket_number' => $ticketNumber,
                ], 201);
            }

            return redirect()->back()->with('success_ticket', $ticketNumber);
        });
    }

    // Submit form pengaduan keberatan
    public function storeComplaint(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        return DB::transaction(function () use ($request, $validated) {
            $attachmentPath = null;
            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('attachments/complaints', 'public');
            }

            $ticketNumber = $this->generateTicketNumber('CMP', Complaint::class);

            $complaint = Complaint::create([
                'ticket_number' => $ticketNumber,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'attachment' => $attachmentPath,
                'status' => 'pending',
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pengaduan berhasil dikirim.',
                    'ticket_number' => $ticketNumber,
                ], 201);
            }

            return redirect()->back()->with('success_complaint_ticket', $ticketNumber);
        });
    }

    // Tracking permohonan informasi
    public function trackRequest(string $ticket)
    {
        $requestData = InformationRequest::with(['statusHistories' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->where('ticket_number', $ticket)->first();

        if (!$requestData) {
            if (request()->wantsJson()) {
                return response()->json(['message' => 'Nomor tiket tidak ditemukan.'], 404);
            }
            return redirect()->back()->withErrors(['ticket' => 'Nomor tiket tidak ditemukan.']);
        }

        if (request()->wantsJson()) {
            return response()->json(['data' => $requestData]);
        }

        // blade view buatan FE5 nanti
        return view('public.service.tracking', compact('requestData'));
    }

    // Tracking pengaduan 
    public function trackComplaint(string $ticket)
    {
        $complaintData = Complaint::where('ticket_number', $ticket)->first();

        if (!$complaintData) {
            if (request()->wantsJson()) {
                return response()->json(['message' => 'Nomor tiket pengaduan tidak ditemukan.'], 404);
            }
            return redirect()->back()->withErrors(['ticket' => 'Nomor tiket pengaduan tidak ditemukan.']);
        }

        if (request()->wantsJson()) {
            return response()->json(['data' => $complaintData]);
        }

        return view('public.service.tracking_complaint', compact('complaintData'));
    }
}
