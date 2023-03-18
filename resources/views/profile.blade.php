@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                       <img src="@if (!empty($user->profile_image)) {{$user->profile_image}} @else {{asset('images/user-profile-avatar.jpg')}} @endif" alt="{{$user->name}}" class="rounded-circle justify-center" style="width:200px;height:200px;">
                       <h3 class="text-center mt-3">{{ $user->name }}</h3>
                       <div class="row text-center justify-content-center mt-3 mb-3">
                        <strong>Followers : 1200</strong>
                        <strong>Following : 120</strong>
                       </div>
                       <button class="btn btn-primary rounded shadow pl-5 pr-5">Follow</button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($feeds as $feed)
                <div class="col-md-6 mt-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ $feed->image_url }}" alt="{{ $feed->description }}" class="img-thumbnail">
                        <div class="card-body">
                            <p class="font-weight-bolder">
                                {{ $feed->description }}
                            </p>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <span class="float-left"> published by {{ $feed->publisher->name}}</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        <span>200 <i class="fas fa-eye fa-2x"></i></span>
                                        <form action="{{ route('like_feed' , [$feed])}}" method="post">
                                        @csrf
                                        <button class="bg-transparent border-0">
                                            <span class="font_weight_bold">{{ $feed->likes_count }}</span>
                                            <i class="fas fa-heart fa-2x @if(check_user_if_liked($feed , auth()->user()->id)) text-danger @endif"></i>
                                        </button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        
            </div>

        </div>

        
    </div>
@endsection