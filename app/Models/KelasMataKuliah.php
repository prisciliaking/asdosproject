<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMataKuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
     
    // Specify the table name (optional if the table name follows Laravel's conventions)
    protected $table = 'kelas_mata_kuliahs';

    protected $primaryKey = 'kelas_id';

    protected $fillable = [
        'kelas_name',
        'mata_kuliah_hari',
        'mata_kuliah_jam',
        'whats_app_link',
        'kelas_semester',
    ];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'dosen_id');
    }
    public function MataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id', 'matkul_id');
    }
}
