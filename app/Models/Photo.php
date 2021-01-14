<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected  $table = 'photos';
    protected $fillable = ['id','path','user_id'];
    public $timestamps = false;

    public function User() {
        return $this->belongsTo('App\Models\User');
    }
}
