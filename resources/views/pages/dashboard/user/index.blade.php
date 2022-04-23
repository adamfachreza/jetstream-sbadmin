@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
            <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Tambah User</a>
        </div>
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                @if (session()->has('pesan'))
                <div class="alert success" role="alert">
                    {{ session()->get('pesan')}}
                </div>
                @endif
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped table-fixed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>user_id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>role</th>
                                <th>action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $key => $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$user->id}}</a>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles}}</td>
                                <td>
                                    <a href="{{ route('users.edit',['user' => $user->id])}}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                    <a href="{{ route('reset',['user' => $user->id])}}" class="btn btn-primary btn-circle btn-sm"><i class="fa-light fa-arrows-rotate"></i></a>
                                    <form action="{{ route('users.destroy',['user'=>$user->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="6" class="text-center">data tidak ada..</td>
                            @endforelse
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
@endsection
