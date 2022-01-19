<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class House extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at', 'date_auto'];
    public $timestamps = false;
    protected $casts = [
        'created_at' => 'datetime'
    ];
    protected $fillable = [
        'emblem',
        'name',
        'ancestral_fortress',
        'slogan',
        'quantity_of_characters',
        'quantity_of_live_characters',
        'user_id',
    ];
    private mixed $user_id;
    /**
     * @var mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
