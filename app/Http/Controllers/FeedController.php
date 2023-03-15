<?php

namespace App\Http\Controllers;

use App\Models\Feed;
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
            // 'image' => 'required |max:10000',
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
