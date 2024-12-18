<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahAccept extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'accept_id';

    protected $fillable = [
        'user_id',
        'mata_kuliah_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(KelasMataKuliah::class, 'mata_kuliah_id', 'kelas_id')
            ->with('mataKuliahDosen.dosen'); // Include relationships with MataKuliahDosen and Dosen
    }
}
