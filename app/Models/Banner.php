<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

     use HasFactory;

    protected $table = 'banners';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'page',
        'image',
        'status',
    ];

}
