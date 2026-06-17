@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        Login FreelanceHub
                    </h2>

                    <p class="text-muted">
                        Masuk ke akun Anda
                    </p>

                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="form-check mb-3">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="remember"
                        >

                        <label class="form-check-label">
                            Remember Me
                        </label>

                    </div>

                    <button class="btn btn-primary w-100">

                        Login

                    </button>

                </form>

                <div class="text-center mt-3">

                    <a href="{{ route('register') }}">
                        Belum punya akun?
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection