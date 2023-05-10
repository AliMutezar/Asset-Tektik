@extends('layouts.app')
@section('title', 'Profile')

@section('content')

<div class="position-absolute w-100 min-height-300 top-0"
    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-secondary opacity-6"></span>
</div>
@include('includes.sidebar')

<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">

                        @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="profile_image"
                            class="border-radius-sm shadow-sm w-100 h-100">
                        @else
                        <img src="{{ url('img/bruce-mars.jpg') }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                        @endif

                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Administrator
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    href="{{ route('dashboard') }}">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    href="javascript:;">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Edit Profile</p>


                        </div>
                    </div>
                    <div class="card-body">
                        <form id="update-form" action="{{ route('profile.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Name</label>
                                        <input
                                            class="form-control @error('name') is-invalid @elseif(!empty(old('name'))) is-valid @enderror"
                                            type="text" name="name" aria-label="name" placeholder="Your Fullname"
                                            value="{{ old('name', $user->name) }}">

                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input
                                            class="form-control @error('email') is-invalid @elseif(!empty(old('email'))) is-valid @enderror"
                                            type="email" name="email" aria-label="email" placeholder="admin@example.com"
                                            value="{{ old('email', $user->email) }}">

                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="formFile" class="form-label">Photo Profile</label>
                                        <input
                                            class="form-control @error('photo') is-invalid @elseif(!empty(old('photo'))) is-valid @enderror"
                                            name="photo" type="file" id="formFile">
                                        <input type="hidden" name="oldImage" value="{{ $user->photo ?? '' }}">

                                        @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="role" class="form-label">Role User</label>
                                    <select
                                        class="form-select @error('role') is-invalid  @elseif(!empty(old('role'))) is-valid @enderror"
                                        name="role">
                                        <option selected disabled value="">Choose Role</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' :
                                            ''}}>Admin</option>
                                        <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' :
                                            ''}}>Staff</option>
                                    </select>

                                    @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nik" class="form-control-label">NIK</label>
                                        <input
                                            class="form-control @error('nik') is-invalid @elseif(!empty(old('nik'))) is-valid @enderror"
                                            type="text" name="nik" aria-label="nik" placeholder="NIK Employee"
                                            value="{{ old('nik', $user->nik) }}">

                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="form-control-label">Phone</label>
                                        <input
                                            class="form-control @error('phone') is-invalid @elseif(!empty(old('phone'))) is-valid @enderror"
                                            type="text" name="phone" aria-label="phone" placeholder="087xxxxxxxxx"
                                            value="{{ old('phone', $user->phone) }}">

                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <hr class="horizontal dark">

                            <p class="text-uppercase text-sm">Department Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="division_id" class="form-control-label">Department</label>

                                        <select
                                            class="form-select @error('division_id') is-invalid @elseif(!empty(old('division_id'))) is-valid @enderror"
                                            aria-label="Select Division ID" name="division_id">
                                            <option selected disabled value="">Choose Department</option>
                                            @foreach ($division as $item)
                                            <option value="{{ $item->id }}" {{ old('division_id', $user->division_id) ==
                                                $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('division_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position" class="form-control-label">Position</label>
                                        <input
                                            class="form-control @error('position') is-invalid @elseif(!empty(old('position'))) is-valid @enderror"
                                            type="text" name="position" aria-label="position"
                                            placeholder="admin@example.com"
                                            value="{{ old('position', $user->position) }}">

                                        @error('position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid d-sm-block">
                                    <button class="btn btn-primary btn-sm" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>

                        <hr class="horizontal dark">

                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            @method('put')

                            <p class="text-uppercase text-sm">Change Password</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="position" class="form-control-label">Current Password</label>
                                        <input
                                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                            id="current_password" name="current_password" type="password"
                                            autocomplete="current-password">

                                        @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">
                                            {{ $errors->updatePassword->first('current_password') }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="position" class="form-control-label">New Password</label>
                                        <input
                                            class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                            type="password" name="password" autocomplete="new-password">

                                        @error('password', 'updatePassword')
                                        <div class="invalid-feedback">
                                            {{ $errors->updatePassword->first('password') }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="position" class="form-control-label">Confirm Password</label>
                                        <input
                                            class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                            type="password" name="password_confirmation" autocomplete="new-password">

                                        @error('password_confirmation', 'updatePassword')
                                        <div class="invalid-feedback">
                                            {{ $errors->updatePassword->first('password_confirmation') }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid d-sm-block">
                                <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
</div>

@endsection