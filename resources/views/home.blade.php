@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @for ($i = 1; $i < 10; $i++)
        <div class="col-md-6 mt-3 mb-3">
            <div class="card">
                <img src="{{ asset('images/user-profile-avatar.jpg') }}" alt="avatar" class="img-thumbnail">
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci explicabo nesciunt natus velit minima voluptas suscipit ab, id cum nam esse! Molestias neque hic delectus quibusdam debitis dolor a animi.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <span class="float-left"> publishe by nj</span>
                        </div>
                        <div class="col-md-6">
                            <button class="float-right">Like</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

    </div>
</div>
@endsection
