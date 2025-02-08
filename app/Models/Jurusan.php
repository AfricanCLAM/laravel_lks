<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    public $timestamps = false;

    protected $fillable = [
        'nama_jurusan',
        'kelas_id'
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
