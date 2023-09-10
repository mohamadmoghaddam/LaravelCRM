@extends('layouts.app')

@section('dashboard')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('subviews.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('subviews.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Users Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Update a User!</h1>
                                </div>
                                <form class="user" method="post" action="/users/{{ $user['id'] }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="username" value="{{old('username', $user['username'])}}"  class="form-control form-control-user" id="exampleInputUsername"
                                            placeholder="Username">
                                            @error('username')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="firstname" value="{{old('firstname', $user['firstname'])}}" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" value="{{old('lastname', $user['lastname'])}}" class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{old('email', $user['email'])}}" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Email Address">
                                            @error('email')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Update Account">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection
