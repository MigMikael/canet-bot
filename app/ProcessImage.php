<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessImage extends Model
{
    public $timestamps = true;
    protected $table = 'process_image';
    protected $fillable = ['area', 'image'];
}
