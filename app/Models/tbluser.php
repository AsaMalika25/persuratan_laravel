<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tbluser extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['username','password','role'];
    public $timestamps = false;
}
