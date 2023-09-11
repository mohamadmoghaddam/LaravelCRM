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
                    <h1 class="h3 mb-2 text-gray-800">Clients</h1>
                    <p class="mb-4">You can view and manage clients here.</p>

                    <!-- Clients Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients
                            <button class="btn btn-success btn-icon-split btn-sm float-right" onclick="window.location.href='/clients/create';">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Client</span>
                            </button></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Address</th>
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
                                        @foreach ( $clients as $client)
                                        <tr>
                                            <td>{{ $client['company_name'] }}</td>
                                            <td>{{ $client['company_address'] }}</td>
                                            <td>
                                            <form action="/clients/{{ $client['id'] }}" method="post">
                                                <button class="btn btn-warning btn-circle" type="button" onclick="window.location.href='/clients/{{ $client['id'] }}/edit';" ><i class="fas fa-pen"></i></button>
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
