@extends('layouts.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">My Profile</h4>

    <!-- Basic Layout -->
    <div class="row">
      
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update profile</h5>
          </div>
            @if(session()->has('message'))
              <div class="alert alert-success text-center" role="alert"> {{ session()->get('message') }}</div>
            @endif
          <div class="card-body">
            <form action="{{route('update.profile')}}" method="POST" id="form_id">
                @csrf
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                  <input type="text" class="form-control" name="name" id="basic-icon-default-fullname" value="{{$userData->name}}" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                </div>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                  <input type="text" id="basic-icon-default-email" name="email" class="form-control" value="{{$userData->email}}" aria-describedby="basic-icon-default-email2">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Mobile No</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                  <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" name="mobile" value="{{$userData->mobile}}" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                </div>
                @error('mobile')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Password</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-key"></i></span>
                  <input type="password" id="basic-icon-default-phone" class="form-control phone-mask" name="password"  aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                </div>
                @error('password')
                   <p class="text-danger">{{ $message }}</p>
               @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-key"></i></span>
                  <input type="password" id="basic-icon-default-phone" class="form-control phone-mask" name="confirm_password"  aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                </div>
                @error('confirm_password')
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