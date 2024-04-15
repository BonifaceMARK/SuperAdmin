@extends('layout.title')

@section('title', env('APP_NAME'))
@include('layout.title')

<body>

    <!-- ======= Header ======= -->

    @include('layouts.appheader');
    
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.appsidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vendor Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Vendor View</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="container-fluid">
                <div class="row">
                    {{-- <!-- List Vendor Sales --> --}}
                    <div class="col-xxl-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Vendor Manage</h5>
                                <div class="table-responsive">
                                <table id="example" class="table display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendor as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->full_name }}</td>
                                            <td>{{ $row->company_name }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td>{{ $row->created_at->format('F d, Y') }}</td>
                                            <td>
                                                @if ($row->id)
                                                    <a class="btn btn-primary" href="{{ route('edit.vendor', ['id' => $row->id]) }}">Edit</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div><!-- End List Vendor Sales -->
                </div>
            </div>
        </section>
        {{-- <div class="modal fade" id="update" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Update Vendor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($vendorUser as $data)
                        @if ($data->id == auth()->user()->id)
                                <form method="POST" action="{{ route('edit.vendor', ['id' => $data->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <!-- Form fields for editing vendor user details -->
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name" class="fw-bold">Name:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" id="name" name="name"
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="email" class="fw-bold">Email:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="email" id="email" name="email"
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="join_date" class="fw-bold">Date:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" name="date" id="date"
                                                value="{{ $data->join_date }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="role" class="fw-bold">Role</label>
                                        </div>
                                        <div class="col-auto">
                                            <select name="role_name" id="role" required class="form-control"
                                                style="border: 1px solid;">
                                                <option value="">Select Role</option>
                                                <option value="Vendor"
                                                    {{ $data->role_name == 'Vendor' ? 'selected' : '' }}>Vendor
                                                </option>
                                                <option value="Client"
                                                    {{ $data->role_name == 'Client' ? 'selected' : '' }}>Client
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Submit button inside the form -->
                                    <div class="modal-footer">
                                        <a href="{{ route('vendorManage') }}"
                                            class="btn btn-outline-primary">Cancel</a>
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                    </div>
                                </form>
                            @else
                                <p>User ID: {{ auth()->user()->id }} | Vendor ID: {{ $data->id }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i>
    </a>
    @include('layout.footer')


</body>

</html>
