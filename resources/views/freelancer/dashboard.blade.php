@extends('layouts.app')

@section('content')

    <div class="hero">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h1>

                    Halo,
                    {{ auth()->user()->name }} 🚀

                </h1>

                <p class="mt-3">

                    Temukan project baru,
                    bangun reputasi,
                    dan tingkatkan pendapatan Anda.

                </p>

                <a href="{{ route('find.work') }}" class="btn btn-light btn-lg mt-3">

                    <i class="bi bi-search"></i>

                    Cari Project

                </a>

            </div>

            <div class="col-md-4 text-center">

                <i class="bi bi-person-workspace" style="font-size:120px;opacity:.3;">
                </i>

            </div>

        </div>

    </div>

    <h2 class="section-title">

        Freelancer Dashboard

    </h2>

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="dashboard-card">

                <div class="card-icon icon-blue">

                    <i class="bi bi-send-fill"></i>

                </div>

                <h6>Total Proposal</h6>

                <div class="stat-number">

                    {{ $totalProposals ?? 0 }}

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="dashboard-card">

                <div class="card-icon icon-green">

                    <i class="bi bi-trophy-fill"></i>

                </div>

                <h6>Project Menang</h6>

                <div class="stat-number">

                    {{ $hiredProjects ?? 0 }}

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="dashboard-card">

                <div class="card-icon icon-yellow">

                    <i class="bi bi-star-fill"></i>

                </div>

                <h6>Total Review</h6>

                <div class="stat-number">

                    {{ $totalReviews ?? 0 }}

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="dashboard-card">

                <div class="card-icon icon-red">

                    <i class="bi bi-lightning-fill"></i>

                </div>

                <h6>Status Akun</h6>

                <span class="badge bg-success p-2">

                    Freelancer Aktif

                </span>

            </div>

        </div>

    </div>
    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0">
                    Quick Menu
                </h2>

                <span class="text-muted">
                    Akses fitur utama
                </span>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <a href="{{ route('find.work') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    🔍
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Cari Project
                                </h5>

                                <small class="text-muted">
                                    Temukan project baru
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('my.proposals') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    📨
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Proposal Saya
                                </h5>

                                <small class="text-muted">
                                    Kelola proposal
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('contracts.index') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    📄
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Kontrak Saya
                                </h5>

                                <small class="text-muted">
                                    Lihat kontrak aktif
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('reviews.index') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    ⭐
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Review Saya
                                </h5>

                                <small class="text-muted">
                                    Rating & ulasan
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('freelancer.profile') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    👤
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Profil Saya
                                </h5>

                                <small class="text-muted">
                                    Edit profil freelancer
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('portfolio.index') }}" class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 menu-card">
                            <div class="card-body text-center p-4">

                                <div class="fs-1 mb-3">
                                    💼
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Portfolio Saya
                                </h5>

                                <small class="text-muted">
                                    Kelola hasil karya
                                </small>

                            </div>
                        </div>

                    </a>
                </div>

            </div>

        </div>
    </div>

    <style>
        .menu-card {
            transition: all .3s ease;
            border-radius: 20px;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
        }
    </style>

    <div class="col-md-4">

        <div class="dashboard-card text-center">

            @if(isset($profile) && $profile->photo)

                <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mb-3" width="120" height="120"
                    style="object-fit:cover;">

            @else

                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=14b8a6&color=fff&size=200"
                    class="rounded-circle mb-3">

            @endif

            <h3>

                {{ auth()->user()->name }}

            </h3>

            <h6 class="text-success">

                {{ $profile->title ?? 'Freelancer Professional' }}

            </h6>

            <p class="text-muted">

                📍 {{ $profile->location ?? 'Belum diisi' }}

            </p>

            <hr>

            <div class="row text-center">

                <div class="col-6">

                    <h5 class="fw-bold">

                        {{ $profile->experience_year ?? 0 }}

                    </h5>

                    <small>
                        Tahun
                    </small>

                </div>

                <div class="col-6">

                    <h5 class="fw-bold">

                        ⭐ {{ $totalReviews ?? 0 }}

                    </h5>

                    <small>
                        Reviews
                    </small>

                </div>

            </div>

            <hr>

            <p>

                💰 Rp
                {{ number_format($profile->hourly_rate ?? 0, 0, ',', '.') }}
                / Jam

            </p>

            <a href="{{ route('freelancer.profile') }}" class="btn btn-dark w-100">

                <i class="bi bi-person-badge"></i>
                Lihat Profil

            </a>

        </div>

    </div>

    </div>

@endsection