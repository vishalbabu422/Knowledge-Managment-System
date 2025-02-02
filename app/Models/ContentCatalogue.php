<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentCatalogue extends Model
{
    protected $table = "content_catalogue";

    protected $fillable = [
        'title',
        'description',
        'path'
    ];
}
