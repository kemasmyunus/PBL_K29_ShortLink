<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_username', 'code', 'judul', 'link'];

    // untuk menghubungkan dengan tabel user
    public function user(){
        return $this->belongsTo(User::class);
    }

}
