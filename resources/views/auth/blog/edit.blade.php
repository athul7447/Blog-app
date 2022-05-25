@extends('layouts.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Blog</h4>

    <!-- Basic Layout -->
    <div class="row">
      
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Blog</h5>
          </div>
           
          <div class="card-body">
            <form action="{{route('blog.update',$data->id)}}" method="POST" id="form_id" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="blog-title">Title</label>
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" name="title" id="blog-title" value="{{$data->title}}" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                </div>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Image</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="file" id="blog-file" name="image" class="form-control" aria-describedby="basic-icon-default-email2">
                  <input type="hidden" value="{{$data->image}}" name="old_image">
                </div>
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="blog-Descreption">Description</label>
                <div class="input-group input-group-merge">

                  <textarea name="description" id="blog-description"class="form-control">
                    {{$data->description}}
                  </textarea>
                </div>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection