<?php

namespace App\Http\Controllers;

use App\Models\Feed;
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
}
