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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-5">
                                <form class="user" method="post" action="/projects">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName">Title</label>
                                        <input type="text" name="title" value="{{old('title', $project['title'])}}"  class="form-control" id="exampleInputName"
                                            placeholder="title">
                                            @error('title')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" placeholder="description" class="form-control form-control-textarea" rows="4" cols="50">{{ old('description', $project['description']) }}</textarea>
                                        @error('description')
                                        {{ $message }}
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDate">Deadline</label>
                                        <input type="date" name="deadline" value="{{old('deadline', $project['deadline'])}}"  class="form-control" id="exampleInputDate">
                                            @error('date')
                                            {{ $message }}
                                           @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user">Assigned User</label>
                                        <select name="user_id" class="form-control" required id="user">
                                            <option value="{{ $project['user_id'] }}">{{ $project->user['username'] }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user['id'] }}">{{ $user['username'] }}</option>
                                            @endforeach
                                        </select>
                                            @error('user_id')
                                            {{ $message }}
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="client">Assigned Client</label>
                                        <select name="client_id" class="form-control" required id="client">
                                            <option value="{{ $project['client_id'] }}">{{ $project->client['company_name'] }}</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client['id'] }}">{{ $client['company_name'] }}</option>
                                            @endforeach
                                        </select>
                                            @error('client_id')
                                            {{ $message }}
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required id="status">
                                          <option value="open" @selected('open' == $project['status'])>Open</option>
                                          <option value="delivered" @selected('delivered' == $project['status'])>Delivered</option>
                                          <option value="cancelled" @selected('cancelled' == $project['status'])>Cancelled</option>
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
