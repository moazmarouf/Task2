<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected  $table = 'admins';
    protected $fillable = ['name','email','password'];
    public $timestamps = true;
    public function News() {
        return $this->hasMany('App\Models\News');
    }
}
