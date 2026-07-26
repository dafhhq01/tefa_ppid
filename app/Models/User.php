<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // <-- Tambahin trait Spatie
use Filament\Models\Contracts\FilamentUser; // <-- Tambahin kontrak Filament
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

   
    public function canAccessPanel(Panel $panel): bool
    {
        // role admin, ppid, atau pimpinan yang boleh masuk panel admin
        return $this->hasAnyRole(['admin', 'ppid', 'pimpinan']);
    }
}
