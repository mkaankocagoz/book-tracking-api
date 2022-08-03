<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'read',
        'will_read',
    ];
}
