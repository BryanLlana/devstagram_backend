<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory, HasUuids;

    protected $fillable = [
        "title",
        "description",
        "image",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo(User::class)->select(["id", "name", "username"]);
    }
}
