<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KudoCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'description',
        'kudo_board_id',
        'uri'
    ];
}
