<?php

namespace App\Filament\Resources\InformationRequests;

use App\Filament\Resources\InformationRequests\Pages;
use App\Models\InformationRequest;
use App\Models\StatusHistory;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class InformationRequestResource extends Resource
{
    protected static ?string $model = InformationRequest::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Layanan PPID';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-inbox-arrow-down';
    protected static ?string $navigationLabel = 'Permohonan Informasi';
    protected static ?int $navigationSort = 1;

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                // Section dan Grid menggunakan namespace Schemas\Components di Filament v5
                \Filament\Schemas\Components\Section::make('Informasi Pemohon')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)->schema([
                            \Filament\Forms\Components\TextInput::make('ticket_number')->label('Nomor Tiket')->disabled(),
                            \Filament\Forms\Components\TextInput::make('identity_number')->label('NIK / Identitas')->disabled(),
                            \Filament\Forms\Components\TextInput::make('name')->label('Nama Pemohon')->disabled(),
                            \Filament\Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                            \Filament\Forms\Components\TextInput::make('phone')->label('Nomor HP')->disabled(),
                            \Filament\Forms\Components\Select::make('status')
                                ->options([
                                    'pending' => 'Pending (Menunggu)',
                                    'process' => 'Diproses',
                                    'completed' => 'Selesai',
                                    'rejected' => 'Ditolak',
                                ])
                                ->disabled(),
                        ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Detail Permohonan')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('subject')->label('Subjek Permohonan')->disabled(),
                        \Filament\Forms\Components\Textarea::make('message')->label('Rincian Informasi yang Diminta')->disabled()->columnSpanFull(),
                        \Filament\Forms\Components\FileUpload::make('attachment')
                            ->label('Lampiran dari Pemohon')
                            ->disk('public')
                            ->directory('attachments/requests')
                            ->disabled()
                            ->downloadable()
                            ->openable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('ticket_number')->label('No. Tiket')->searchable()->sortable()->weight('bold'),
                \Filament\Tables\Columns\TextColumn::make('name')->label('Nama Pemohon')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('subject')->label('Subjek')->limit(30)->searchable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')->label('Tanggal Masuk')->dateTime('d M Y, H:i')->sortable(),

                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'process' => 'info',
                        'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'process' => 'Diproses',
                        'completed' => 'Selesai',
                        'rejected' => 'Ditolak',
                        default => $state,
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'process' => 'Diproses',
                        'completed' => 'Selesai',
                        'rejected' => 'Ditolak',
                    ]),
            ])
            ->actions([
                \Filament\Actions\ViewAction::make(),

                \Filament\Actions\Action::make('proses')
                    ->label('Proses')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->visible(fn(InformationRequest $record) => $record->status === 'pending')
                    ->form([
                        \Filament\Forms\Components\Textarea::make('note')
                            ->label('Catatan untuk Pemohon')
                            ->default('Permohonan informasi Anda sedang dipersiapkan oleh tim PPID sekolah.')
                            ->required(),
                    ])
                    ->action(function (InformationRequest $record, array $data): void {
                        $record->update(['status' => 'process']);
                        StatusHistory::create([
                            'request_id' => $record->id,
                            'status' => 'process',
                            'note' => $data['note'],
                            'changed_by' => Auth::id(),
                        ]);
                    }),

                \Filament\Actions\Action::make('selesaikan')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn(InformationRequest $record) => in_array($record->status, ['pending', 'process']))
                    ->form([
                        \Filament\Forms\Components\Textarea::make('note')
                            ->label('Catatan Penyelesaian / Link Dokumen')
                            ->default('Permohonan selesai. Dokumen informasi yang diminta sudah dapat diambil atau dikirimkan via email.')
                            ->required(),
                    ])
                    ->action(function (InformationRequest $record, array $data): void {
                        $record->update(['status' => 'completed']);
                        StatusHistory::create([
                            'request_id' => $record->id,
                            'status' => 'completed',
                            'note' => $data['note'],
                            'changed_by' => Auth::id(),
                        ]);
                    }),

                \Filament\Actions\Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn(InformationRequest $record) => in_array($record->status, ['pending', 'process']))
                    ->form([
                        \Filament\Forms\Components\Textarea::make('note')
                            ->label('Alasan Penolakan (Sesuai UU Keterbukaan Informasi)')
                            ->placeholder('Contoh: Informasi yang diminta termasuk informasi yang dikecualikan...')
                            ->required(),
                    ])
                    ->action(function (InformationRequest $record, array $data): void {
                        $record->update(['status' => 'rejected']);
                        StatusHistory::create([
                            'request_id' => $record->id,
                            'status' => 'rejected',
                            'note' => $data['note'],
                            'changed_by' => Auth::id(),
                        ]);
                    }),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformationRequests::route('/'),
        ];
    }
}