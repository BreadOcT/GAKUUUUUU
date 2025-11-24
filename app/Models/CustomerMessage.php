<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMessage extends Model
{
    use HasFactory;

    protected $table = 'customer_messages';

     // Nonaktifkan otomatis timestamp
    public $timestamps = false;

    protected $fillable = [
        'user_id','name','email','message','balasan','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
