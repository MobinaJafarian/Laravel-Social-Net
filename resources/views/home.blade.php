@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @for ($i = 1; $i < 10; $i++)
        <div class="col-md-6 mt-3 mb-3">
            <div class="card shadow-sm">
                <img src="{{ asset('images/user-profile-avatar.jpg') }}" alt="avatar" class="img-thumbnail">
                <div class="card-body">
                    <p class="font-weight-bolder">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci explicabo nesciunt natus velit minima voluptas suscipit ab, id cum nam esse! Molestias neque hic delectus quibusdam debitis dolor a animi.
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <span class="float-left"> publishe by nj</span>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <span>200 <i class="fas fa-eye fa-1x"></i></span>
                                <button class="bg-transparent border-0">
                                    <i class="fas fa-heart fa-2x text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

    </div>
</div>
@endsection
