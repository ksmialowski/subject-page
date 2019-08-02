<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = [
        'title',
        'description',
        'name_of_image',
        'size_of_image',
        'filename',
        'size_of_file'
    ];
}
