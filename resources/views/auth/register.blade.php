@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        Daftar FreelanceHub
                    </h2>

                    <p class="text-muted">
                        Buat akun baru
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Daftar Sebagai
                        </label>

                        <select
                            name="role"
                            class="form-select"
                            required
                        >
                            <option value="client">
                                Client
                            </option>

                            <option value="freelancer">
                                Freelancer
                            </option>
                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >

                    </div>

                    <button class="btn btn-success w-100">

                        Register

                    </button>

                </form>

                <div class="text-center mt-3">

                    <a href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection