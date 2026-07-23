<?php

namespace App\Filament\Resources\Complaints;

use App\Filament\Resources\Complaints\Pages;
use App\Models\Complaint;
use App\Models\StatusHistory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Layanan PPID';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationLabel = 'Pengaduan Keberatan';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Schemas\Components\Section::make('Informasi Pelapor')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)->schema([
                            \Filament\Forms\Components\TextInput::make('ticket_number')->label('Nomor Tiket')->disabled(),
                            \Filament\Forms\Components\TextInput::make('name')->label('Nama Pelapor')->disabled(),
                            \Filament\Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                            \Filament\Forms\Components\TextInput::make('phone')->label('Nomor HP')->disabled(),
                            \Filament\Forms\Components\Select::make('status')->options([
                                'pending' => 'Pending',
                                'process' => 'Diproses',
                                'completed' => 'Selesai',
                                'rejected' => 'Ditolak',
                            ])->disabled(),
                        ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Detail Pengaduan')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('subject')->label('Subjek Pengaduan')->disabled(),
                        \Filament\Forms\Components\Textarea::make('message')->label('Isi Keberatan / Keluhan')->disabled()->columnSpanFull(),
                        \Filament\Forms\Components\FileUpload::make('attachment')
                            ->label('Bukti Pendukung')
                            ->disk('public')
                            ->directory('attachments/complaints')
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
                \Filament\Tables\Columns\TextColumn::make('name')->label('Nama Pelapor')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('subject')->label('Subjek')->limit(30)->searchable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')->label('Tanggal Masuk')->dateTime('d M Y, H:i')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'process' => 'info',
                        'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'process' => 'Diproses',
                        'completed' => 'Selesai',
                        'rejected' => 'Ditolak',
                        default => $state,
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'process' => 'Diproses',
                    'completed' => 'Selesai',
                    'rejected' => 'Ditolak',
                ]),
            ])
            ->actions([
                \Filament\Actions\Action::make('proses')
                    ->label('Proses')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->visible(fn (Complaint $record): bool => $record->status === 'pending')
                    ->form([
                        \Filament\Forms\Components\Textarea::make('note')
                            ->label('Catatan Tindakan')
                            ->default('Pengaduan Anda sedang ditinjau oleh pimpinan dan tim PPID.')
                            ->required(),
                    ])
                    ->action(function (Complaint $record, array $data): void {
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
                    ->visible(fn (Complaint $record): bool => in_array($record->status, ['pending', 'process']))
                    ->form([
                        \Filament\Forms\Components\Textarea::make('note')
                            ->label('Hasil Resolusi / Tanggapan Resmi')
                            ->default('Keberatan informasi telah diselesaikan. Tanggapan resmi telah dikirimkan ke email Anda.')
                            ->required(),
                    ])
                    ->action(function (Complaint $record, array $data): void {
                        $record->update(['status' => 'completed']);
                        StatusHistory::create([
                            'request_id' => $record->id,
                            'status' => 'completed',
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
            'index' => Pages\ListComplaints::route('/'),
        ];
    }
}