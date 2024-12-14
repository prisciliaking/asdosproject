<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahPilihan extends Model
{
    public $timestamps = false;
    use HasFactory;

    // Specify the table name (optional if following Laravel conventions)
    protected $table = 'mata_kuliah_pilihans';

    // Specify the primary key
    protected $primaryKey = 'mata_kuliah_pilihan_id';

    // Fillable attributes
    protected $fillable = [
        'pilihan_status',
        'user_id',
        'mata_kuliah_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'mata_kuliah_id');
    }

}

