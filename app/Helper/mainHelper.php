<?php

use App\Models\Like;

function check_user_if_liked($feed , $user)
    {
        return empty(Like::where([
            'feed_id' => $feed->id,
            'user_id' => $user
        ])->first()) ? false : true;
    }