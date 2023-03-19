<?php

use App\Models\Follow;
use App\Models\Like;

function check_user_if_liked($feed , $user)
    {
        return empty(Like::where([
            'feed_id' => $feed->id,
            'user_id' => $user
        ])->first()) ? false : true;
    }
    
    function check_user_if_followed($follower , $following)
    {
        return empty(Follow::where([
            'follower_id' => $follower,
            'following_id' => $following
        ])->first()) ? true : false;
    }