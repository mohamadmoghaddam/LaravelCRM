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
                            <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-5">
                                <form class="user" method="post" action="/clients">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName">Title</label>
                                        <input type="text" name="title" value="{{old('title')}}"  class="form-control form-control-user" id="exampleInputName"
                                            placeholder="title">
                                            @error('title')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" placeholder="description" class="form-control form-control-textarea" rows="4" cols="50">{{ old('description ') }}</textarea>
                                        @error('description')
                                        {{ $message }}
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDate">Deadline</label>
                                        <input type="date" name="deadline" value="{{old('deadline')}}"  class="form-control form-control-user" id="exampleInputDate">
                                            @error('date')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user">Assigned User</label>
                                        <select name="user" class="form-control" required value="{{old('user')}}" id="user">
                                            @foreach ($users as $user)
                                                <option value="{{ $user['id'] }}">{{ $user['username'] }}</option>
                                            @endforeach
                                        </select>
                                            @error('user')
                                            {{ $message }}
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="client">Assigned Client</label>
                                        <select name="client" class="form-control" required value="{{old('client')}}" id="client">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client['id'] }}">{{ $client['company_name'] }}</option>
                                            @endforeach
                                        </select>
                                            @error('client')
                                            {{ $message }}
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required value="{{old('status')}}" id="status">
                                          <option value="open">Open</option>
                                          <option value="delivered">Delivered</option>
                                          <option value="cancelled">Cancelled</option>
                                        </select>
                                            @error('status')
                                            {{ $message }}
                                            @enderror
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register Project">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection
