<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user)
    {
        $user = User::find($user);
        $feeds = Feed::where('publisher_id' , $user->id)->get();
        return view('profile' , compact('user' , 'feeds'));
    }

    public function follow($user)
    {
        if(check_user_if_followed(auth()->user()->id , $user)){
           $follow = new Follow();
           $follow->follower_id = auth()->user()->id;
           $follow->following_id = $user;
           $follow->save();
           return back();
        }else{
            Follow::where([
                'follower_id' => auth()->user()->id,
                'following_id' => $user
            ])->delete();
            return back();
        }
    }
}
