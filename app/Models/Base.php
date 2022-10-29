<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;
    protected $fillable =[
        'global_id',
        'project_name',
        'copy',
        'genre',
        'type',
        'place',
        'release_exist',
        'release_date',
        'release_type',
        'release_name',
        'release_link',
        'event_exist',
        'event_date',
        'event_pref',
        'event_place',
        'event_name',
        'event_link',
        'event_link_com',
    ];
}
