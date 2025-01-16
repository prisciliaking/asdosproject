<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RegistrasiAsdos extends Model
{
    // use HasFactory;

    protected $table = 'registrasi_asdos';
    protected $primaryKey = 'registrasi_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'matkul_id',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matkul_id');
    }
    // public function kelas()
    // {
    //     return $this->belongsTo(KelasMataKuliah::class, 'kelas_id');
    // }
}
