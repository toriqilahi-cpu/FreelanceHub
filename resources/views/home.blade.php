@extends('layouts.app')

@section('content')

    <div class="container py-5">

        {{-- HERO --}}
        <div class="card border-0 rounded-5 overflow-hidden shadow-lg mb-5">

            <div class="p-5 text-white" style="background:linear-gradient(135deg,#2563eb,#14b8a6);">

                <div class="row align-items-center">

                    <div class="col-lg-7">

                        <h1 class="display-4 fw-bold mb-3">

                            Temukan Freelancer Terbaik 🚀

                        </h1>

                        <p class="fs-5 mb-4">

                            Platform freelance untuk menemukan talenta terbaik
                            dan menyelesaikan project dengan cepat dan profesional.

                        </p>

                        @guest

                            <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill px-4 me-2">

                                Mulai Sekarang

                            </a>

                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">

                                Login

                            </a>

                        @endguest

                    </div>

                    <div class="col-lg-5 text-center">

                        <div style="font-size:120px;opacity:.2;">

                            👨‍💻

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- TOP FREELANCER --}}
        <div class="mb-5">

            <h2 class="fw-bold mb-4">

                ⭐ Top Freelancer

            </h2>

            <div class="row">

                @foreach($topFreelancers as $freelancer)

                    <div class="col-lg-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-5 h-100 freelancer-card">

                            <div class="card-body text-center">

                                @if(optional($freelancer->freelancerProfile)->photo)

                                    <img src="{{ asset('storage/' . $freelancer->freelancerProfile->photo) }}"
                                        class="rounded-circle mb-3" width="100" height="100" style="object-fit:cover;">

                                @else

                                    <img src="https://ui-avatars.com/api/?name={{ $freelancer->name }}" class="rounded-circle mb-3">

                                @endif

                                <h4 class="fw-bold">

                                    {{ $freelancer->name }}

                                </h4>

                                <p class="text-success">

                                    {{ optional($freelancer->freelancerProfile)->title }}

                                </p>

                                <p class="text-warning fw-bold">

                                    ⭐ {{ number_format($freelancer->reviews_received_avg_rating ?? 0, 1) }}

                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- PROJECT TERBARU --}}
        <div class="mb-5">

            <h2 class="fw-bold mb-4">

                📁 Project Terbaru

            </h2>

            <div class="row">

                @foreach($latestProjects as $project)

                    <div class="col-lg-4 mb-4">

                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none text-dark">

                            <div class="card border-0 shadow-sm rounded-5 h-100 project-card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between mb-3">

                                        <span class="badge bg-primary">

                                            {{ ucfirst($project->status) }}

                                        </span>

                                        <span class="text-success fw-bold">

                                            Rp {{ number_format($project->budget, 0, ',', '.') }}

                                        </span>

                                    </div>

                                    <h5 class="fw-bold">

                                        {{ $project->title }}

                                    </h5>

                                    <p class="text-muted">

                                        {{ \Illuminate\Support\Str::limit($project->description, 100) }}

                                    </p>

                                    <hr>

                                    <div class="d-flex justify-content-between">

                                        <small class="text-muted">

                                            📅 {{ $project->deadline }}

                                        </small>

                                        <small class="text-primary fw-bold">

                                            Lihat Detail →

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                @endforeach


            </div>

        </div>

        {{-- STATISTIK --}}
        <div class="row text-center">

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-5">

                    <div class="card-body p-4">

                        <h1 class="fw-bold text-primary">

                            {{ $topFreelancers->count() }}+

                        </h1>

                        <p class="mb-0">

                            Freelancer Aktif

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-5">

                    <div class="card-body p-4">

                        <h1 class="fw-bold text-success">

                            {{ $latestProjects->count() }}+

                        </h1>

                        <p class="mb-0">

                            Project Tersedia

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-5">

                    <div class="card-body p-4">

                        <h1 class="fw-bold text-warning">

                            100%

                        </h1>

                        <p class="mb-0">

                            Marketplace Laravel

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <style>
        .freelancer-card,
        .project-card {
            transition: .3s;
        }

        .freelancer-card:hover,
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
        }
    </style>

@endsection