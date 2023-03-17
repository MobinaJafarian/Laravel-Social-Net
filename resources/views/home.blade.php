@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-block shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Create New Feed
</button>

<!-- Modal -->
<form action="{{ route('submit_feed') }}" method="post" enctype="multipart/form-data">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Feed</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @csrf
        <div class="form-group">
            <img src="" alt="" id="image_cast">
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" class="form-control-file" name="image" id="image" accept="image/*" onchange="showImage(this)">
        @error('image')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea type="file" class="form-control" name="description" id="description" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

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
                                <span>200 <i class="fas fa-eye fa-1x"></i></span>
                                <form action="{{ route('like_feed' , [$feed])}}" method="post">
                                @csrf
                                <button class="bg-transparent border-0">
                                    <i class="fas fa-heart fa-2x text-danger"></i>
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
@endsection
@section('javascript')
    <script>
        function showImage(image){
            if (image.files && image.files[0]){
                let fileReader = new fileReader();
                fileReader.onload = function(e){
                    $('#image_cast')
                        .attr('src' , e.target.result)
                        .height(262);      
                };
                fileReader.readAsDataURL(image.files[0]);
            }
        }
    </script>
@endsection