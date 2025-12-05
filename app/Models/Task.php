<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Task extends Model
{
    use HasFactory;

    /**
     * Properti yang dapat diisi secara massal (mass assignable).
     * Sesuai dengan detail input dari flowchart (task details, due date, priority).
     */
    protected $fillable = [
        'user_id',          // Foreign Key ke tabel users
        'task_details',     // Deskripsi tugas
        'is_completed',     // Status penyelesaian (boolean)
        'due_date',         // Tanggal jatuh tempo
        'priority_level',   // Tingkat prioritas
    ];

    /**
     * Konversi tipe data untuk kolom tertentu.
     */
    protected $casts = [
        'due_date' => 'datetime',
        'is_completed' => 'boolean',
    ];

    // --- RELATIONS ---

    /**
     * Relasi: Sebuah Task dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
