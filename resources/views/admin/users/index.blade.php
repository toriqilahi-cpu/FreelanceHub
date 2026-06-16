@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="fw-bold mb-4">
        Kelola User
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <table class="table">

                <thead>

                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($users as $user)

                        <tr>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>

                                <span class="badge bg-primary">
                                    {{ $user->role }}
                                </span>

                            </td>

                            <td>

                                <a href="{{ route('admin.users.edit',$user->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.users.destroy',$user->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus user?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection