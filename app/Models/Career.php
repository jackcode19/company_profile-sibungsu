<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'image',
        'content',
    ];

}
