<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahDosen extends Model
{
    protected $table = 'mata_kuliah_dosens'; // Plural table name
    protected $primaryKey = 'matkul_dosen_id'; // Explicit primary key
    public $timestamps = false;

    protected $fillable = [
        'dosen_id',
        'mata_kuliah_id',
    ];
 
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'dosen_id');
    }
 
    public function mataKuliah()
    {   
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'mata_kuliah_id');
    }
}
