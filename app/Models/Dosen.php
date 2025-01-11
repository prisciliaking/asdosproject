<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // use HasFactory;
    public $timestamps = false;
    
    // Specify the table name (optional if the table name follows Laravel's conventions)
    protected $table = 'dosens';

    // Specify the primary key (optional if it's 'id')
    protected $primaryKey = 'dosen_id';

    // Set fillable attributes
    protected $fillable = [
        'dosen_name',
    ];
 
}
