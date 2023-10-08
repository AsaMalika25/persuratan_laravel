<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = ['id_jenis_surat','id_user','tanggal_surat','ringkasan','file'];
    public $timestamps = false;
}
