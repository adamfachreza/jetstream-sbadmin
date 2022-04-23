@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            </div>
            <div class="card-body">
                @if (session()->has('pesan'))
                <div class="alert success" role="alert">
                    {{ session()->get('pesan')}}
                </div>
                @endif
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="First Name">
                        </div>
                        {{-- <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="lastname" name="lastname"
                                placeholder="lastname">
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="email" name="email"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user"
                                id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user"
                                id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                        </div>
                    </div>
                    <input type="hidden" name="auth" value="true">

                    <button class="btn btn-primary btn-user btn-block">
                        Create User
                    </button>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection
