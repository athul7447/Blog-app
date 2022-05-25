@extends('layouts.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Blogs</h4>
    <div class="card">
        <h5 class="card-header">My Bogs</h5>
        @if(session()->has('message'))
        <div class="alert alert-success text-center" role="alert"> {{ session()->get('message') }}</div>
        @endif
        <div class="table-responsive text-nowrap">
            <div class="col-md-3 mb-2 mr-5" style="margin-left: 10px;">

            <a href="{{route('blog.create')}}"><button type="button" class="btn btn-primary">Create Blog</button></a>
            </div>
          <table class="table blog_table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($blogs as $blog)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$blog->title}}</strong></td>
                    <td><img src="{{asset('images/'.$blog->image)}}" height="100px"> </td>
                    <td>{{$blog->description}}</td>
                    <td>{{$blog->created_at}}</td>
                    <td class="text-center">
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('blog.edit',$blog->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{route('blog.delete',$blog->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
@endsection