<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RegistrasiAsdos extends Model
{
    use HasFactory;

    protected $table = 'registrasi_asdos';
    protected $primaryKey = 'regis_id';
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
}