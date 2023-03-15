<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    public function publisher()
    {
        return $this->belongsTo(User::class ,'publisher_id');
    }
}
