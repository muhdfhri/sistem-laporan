<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'dusun',
        'location',
        'status',
        'user_id',
        'likes',
        'views',
        'image_path',
        'admin_response',
        'responded_at',
        'is_public'
    ];

    protected $appends = ['type_label'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'responded_at' => 'datetime',
        'is_public' => 'boolean',
    ];

    public function getTypeLabelAttribute()
    {
        return $this->type === 'pengaduan' ? 'Pengaduan' : 'Aspirasi';
    }

    public function scopePengaduan($query)
    {
        return $query->where('type', 'pengaduan');
    }

    public function scopeAspirasi($query)
    {
        return $query->where('type', 'aspirasi');
    }

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk keluhan publik
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }

    // Scope untuk filter berdasarkan status
    public function scopeStatus($query, $status)
    {
        if ($status && $status !== 'all') {
            return $query->where('status', $status);
        }
        return $query;
    }

    // Accessor untuk status dalam bahasa Indonesia
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'processing' => 'Sedang Diproses',
            'resolved' => 'Selesai',
            'rejected' => 'Ditolak',
            default => 'Unknown'
        };
    }

    // Accessor untuk waktu relatif
    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}