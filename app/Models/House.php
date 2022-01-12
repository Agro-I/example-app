<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
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
    ];
    /**
     * @var mixed
     */
}
