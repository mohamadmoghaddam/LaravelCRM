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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Projects</h1>
                    <p class="mb-4">You can view and manage projects here.</p>

                    <!-- Users Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>deadline</th>
                                            <th>Assigned User</th>
                                            <th>Assigned Client</th>
                                            <th>Status</th>
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        @foreach ( $projects as $project)
                                        <tr>
                                            <td>{{ $project['title'] }}</td>
                                            <td>{{ $project['description'] }}</td>
                                            <td>{{ $project['deadline'] }}</td>
                                            <td>{{ $project->user['username'] }}</td>
                                            <td>{{ $project->client['company_name'] }}</td>
                                            <td>{{ $project['status'] }}</td>
                                            <td>
                                            <form action="/projects/{{ $project['id'] }}" method="post">
                                                <button class="btn btn-warning btn-circle" type="button" onclick="window.location.href='/projects/{{ $project['id'] }}/edit';"><i class="fas fa-pen"></i></button>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection
