<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KudoBoard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'categorie_id',
        'email',
        'birthday',
        'uri'
    ];

    public function categories() {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
