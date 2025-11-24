<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Baris ini yang sebelumnya hilang
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // Relasi ke Tentor
    public function tentor() {
        return $this->belongsTo(Tentor::class);
    }
}