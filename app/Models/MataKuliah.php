<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    public $timestamps = false;

    // use HasFactory;

    // Specify the table name (optional)
    protected $table = 'mata_kuliahs';

    // Specify the primary key (optional)
    protected $primaryKey = 'matkul_id';

    // Specify fillable attributes
    protected $fillable = [
        'matkul_name',
        'isOpen',
    ];

    // Cast `is_deleted` to boolean
    protected $casts = [
        'isOpen' => 'boolean',
    ];
}
