<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMataKuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'kelas_id';

    protected $fillable = [
        'kelas_nama',
        'mata_kuliah_hari',
        'mata_kuliah_jam',
        'whats_app_link',
        'kelas_semester',
        'is_deleted',
        'matkul_dosen_id',
    ];

    /**
     * Relationship with MataKuliahDosen model.
     */
    public function mataKuliahDosen()
    {
        return $this->belongsTo(MataKuliahDosen::class, 'matkul_dosen_id', 'matkul_dosen_id');
    }
}
