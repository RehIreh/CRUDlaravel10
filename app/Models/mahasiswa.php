<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $fillable = ['nomor_induk','nama','jurusan','alamat','SKS','foto','email'];
}
