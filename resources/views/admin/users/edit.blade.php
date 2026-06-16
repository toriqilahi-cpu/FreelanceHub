@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <h2 class="fw-bold mb-4">

                Edit User

            </h2>

            <form
                action="{{ route('admin.users.update',$user->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $user->name }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ $user->email }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select
                        name="role"
                        class="form-control">

                        <option value="admin"
                            {{ $user->role=='admin'?'selected':'' }}>
                            Admin
                        </option>

                        <option value="client"
                            {{ $user->role=='client'?'selected':'' }}>
                            Client
                        </option>

                        <option value="freelancer"
                            {{ $user->role=='freelancer'?'selected':'' }}>
                            Freelancer
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">

                    Update User

                </button>

            </form>

        </div>

    </div>

</div>

@endsection