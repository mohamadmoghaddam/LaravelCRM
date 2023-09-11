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
                    <!-- Add Client -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create Client</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-5">
                                <form class="user" method="post" action="/clients">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="company_name" value="{{old('company_name')}}"  class="form-control form-control-user" id="exampleInputName"
                                            placeholder="Company Name">
                                            @error('company_name')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="company_address" value="{{old('company_address')}}"  class="form-control form-control-user" id="exampleInputAddress"
                                            placeholder="Company Address">
                                            @error('company_address')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register Client">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection
