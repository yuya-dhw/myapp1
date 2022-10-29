<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $fillable =[
        'global_id',
        'connected_id',
        'link',
        'path',
        'name',
        'genre',
        'place',
        'type',
        'description',
    ];
}
