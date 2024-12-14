<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    public $timestamps = false;

    use HasFactory;

    // Specify the table name (optional)
    protected $table = 'mata_kuliahs';

    // Specify the primary key (optional)
    protected $primaryKey = 'mata_kuliah_id';

    // Specify fillable attributes
    protected $fillable = [
        'mata_kuliah_nama',
        'is_deleted',
    ];

    // Cast `is_deleted` to boolean
    protected $casts = [
        'is_deleted' => 'boolean',
    ];
}
