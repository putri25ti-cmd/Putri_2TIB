<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table      = '_portofolio_1157';
    protected $primaryKey = 'portofolio_id';
    protected $fillable    = [
        'foto',
        'nama',
        'alamat',
        'tanggal_lahir',
        'usia',
        'jenis_kelamin',
        'pendidikan',
        'pengalaman',
        'keterampilan',
    ];
}
