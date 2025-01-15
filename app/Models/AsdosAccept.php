<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AsdosAccept extends Model
{
    // use HasFactory;
    protected $table = 'asdos_accept';

    protected $primaryKey = 'accept_id';
    public $timestamps = false;

    protected $fillable = [
        'kelas_id',
        'user_id',
    ];

    public function kelasMataKuliah()
    {
        return $this->belongsTo(KelasMataKuliah::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
