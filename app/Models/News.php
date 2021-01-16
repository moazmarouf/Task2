<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function Admin() {
        return $this->belongsTo('App\Models\Admin');
    }
}
