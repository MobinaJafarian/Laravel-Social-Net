<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $appends = array('likes_count');

    public function publisher()
    {
        return $this->belongsTo(User::class ,'publisher_id');
    }

    public function getLikesCountAttribute()
    {
        return Like::where([
            'feed_id' => $this->id,
            'user_id' => auth()->user()->id,
        ])->count();
    }
}
