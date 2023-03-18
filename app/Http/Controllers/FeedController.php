<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit_feed(Request $request)
    {
        $this->validate($request , [
            'image' => 'required |max:10000',
        ]);
        $image = $request->file('image')->store('images');
        $feed = new Feed();
        $feed->image_url  = Storage::url($image);
        $feed->description  = $request->description;
        $feed->publisher_id  = auth()->id();
        // $feed->save() ? back() : "Error";
        if($feed->save()){
            return back();
        }else{
            return false;
        }
    
    }

    public function like_feed(Request $request , Feed $feed)
    {
        if(check_user_if_liked($feed , auth()->id())){
            Like::where([
                'feed_id' => $feed->id,
                'user_id' => auth()->id()
            ])->first()->delete();
            return back();
        }else{
            $like = new Like();
            $like->feed_id = $feed->id;
            $like->user_id = auth()->id();
            $like->save();
            return back();
        }
        return back();
    }

}
