<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Item;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'user_id'
    ];

    // Relación uno a muchos

    public function items() {
        return $this->hasMany(Item::class);
    }

    // Relación uno a muchos inversa

    public function user() {
        return $this->belongsTo(User::class);
    }
}
