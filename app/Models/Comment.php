<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = [
       'houses_id',
        'user_id',
        'text',
    ];
    public $timestamps = false;

    public function release() {
        return $this->belongsTo(House::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
