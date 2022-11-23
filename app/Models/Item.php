<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'desc',
        'point',
        'type',
        'question_id',
        'user_id'
    ];

    // Relación uno a muchos inversa

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
