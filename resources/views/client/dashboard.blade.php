@extends('layouts.app')

@section('content')

    <div class="container py-4">

        {{-- HERO --}}
        <div class="card border-0 rounded-5 overflow-hidden shadow-sm mb-4">

            <div class="p-4 text-white" style="background:linear-gradient(135deg,#2563eb,#14b8a6);">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <h1 class="fw-bold mb-3" style="font-size:34px;">

                            Halo, {{ auth()->user()->name }} 👋

                        </h1>

                        <p class="mb-4" style="font-size:18px;">

                            Kelola project Anda, temukan freelancer terbaik,
                            dan pantau progres pekerjaan dengan mudah.

                        </p>

                        <a href="{{ route('projects.create') }}" class="btn btn-light rounded-pill px-4 fw-bold">

                            ➕ Post Project

                        </a>

                    </div>

                    <div class="col-lg-4 text-center">

                        <i class="bi bi-kanban-fill" style="font-size:70px;opacity:.25;">
                        </i>

                    </div>

                </div>

            </div>

        </div>

        {{-- STATISTIK --}}
        <h2 class="fw-bold mb-4">

            Client Dashboard

        </h2>

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 stat-card">

                    <div class="card-body text-center py-4">

                        <div class="icon-box bg-primary-subtle mb-3">

                            📁

                        </div>

                        <h5 class="text-muted">

                            Total Project

                        </h5>

                        <h1 class="fw-bold">

                            {{ $totalProjects }}

                        </h1>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 stat-card">

                    <div class="card-body text-center py-4">

                        <div class="icon-box bg-warning-subtle mb-3">

                            ⏳

                        </div>

                        <h5 class="text-muted">

                            Project Aktif

                        </h5>

                        <h1 class="fw-bold">

                            {{ $activeProjects }}

                        </h1>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 stat-card">

                    <div class="card-body text-center py-4">

                        <div class="icon-box bg-success-subtle mb-3">

                            ✅

                        </div>

                        <h5 class="text-muted">

                            Project Selesai

                        </h5>

                        <h1 class="fw-bold">

                            {{ $completedProjects }}

                        </h1>

                    </div>

                </div>

            </div>

        </div>

        {{-- ANALYTICS --}}
        <div class="card border-0 shadow-sm rounded-5 mb-4">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h2 class="fw-bold mb-1">

                            Analytics Dashboard

                        </h2>

                        <p class="text-muted mb-0">

                            Ringkasan performa project Anda

                        </p>

                    </div>

                </div>

                <div class="row align-items-center">

                    {{-- CHART --}}
                    <div class="col-lg-6">

                        <div class="d-flex justify-content-center">

                            <div style="width:300px;height:300px;">

                                <canvas id="projectChart"></canvas>

                            </div>

                        </div>

                    </div>

                    {{-- RINGKASAN --}}
                    <div class="col-lg-6">

                        <div class="row g-3">

                            <div class="col-12">

                                <div class="p-3 rounded-4 border bg-light">

                                    <div class="d-flex justify-content-between">

                                        <span class="fw-semibold">

                                            🟢 Project Open

                                        </span>

                                        <strong>

                                            {{ $openProjects }}

                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="p-3 rounded-4 border bg-light">

                                    <div class="d-flex justify-content-between">

                                        <span class="fw-semibold">

                                            🟡 Project Aktif

                                        </span>

                                        <strong>

                                            {{ $activeProjects }}

                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="p-3 rounded-4 border bg-light">

                                    <div class="d-flex justify-content-between">

                                        <span class="fw-semibold">

                                            🔵 Project Selesai

                                        </span>

                                        <strong>

                                            {{ $completedProjects }}

                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="p-3 rounded-4 bg-success text-white">

                                    <div class="d-flex justify-content-between">

                                        <span class="fw-bold">

                                            Total Project

                                        </span>

                                        <h4 class="mb-0">

                                            {{ $totalProjects }}

                                        </h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        {{-- AKTIVITAS TERBARU --}}
        <div class="card border-0 shadow-sm rounded-5 mb-4">

            <div class="card-body p-4">

                <h2 class="fw-bold mb-4">

                    Aktivitas Terbaru

                </h2>

                @forelse($recentProjects as $project)

                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">

                        <div>

                            <h6 class="mb-1 fw-bold">

                                {{ $project->title }}

                            </h6>

                            <small class="text-muted">

                                Project dibuat

                            </small>

                        </div>

                        <span class="badge bg-primary">

                            {{ $project->status }}

                        </span>

                    </div>

                @empty

                    <p class="text-muted">

                        Belum ada aktivitas.

                    </p>

                @endforelse

            </div>

        </div>
        {{-- QUICK MENU --}}
        <div class="card border-0 shadow-sm rounded-5 mt-3">

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

                    <div class="row g-4">

                        {{-- POST PROJECT --}}
                        <div class="col-md-4">

                            <a href="{{ route('projects.create') }}" class="text-decoration-none">

                                <div class="quick-box">

                                    <div class="quick-icon">

                                        🚀

                                    </div>

                                    <h4 class="fw-bold text-dark">

                                        Post Project

                                    </h4>

                                    <p class="text-muted mb-0">

                                        Buat project baru

                                    </p>

                                </div>

                            </a>

                        </div>

                        {{-- KELOLA PROJECT --}}
                        <div class="col-md-4">

                            <a href="{{ route('projects.index') }}" class="text-decoration-none">

                                <div class="quick-box">

                                    <div class="quick-icon">

                                        📂

                                    </div>

                                    <h4 class="fw-bold text-dark">

                                        Kelola Project

                                    </h4>

                                    <p class="text-muted mb-0">

                                        Lihat semua project

                                    </p>

                                </div>

                            </a>

                        </div>

                        {{-- CARI FREELANCER --}}
                        <div class="col-md-4">

                            <a href="{{ route('client.freelancers.index') }}" class="text-decoration-none">

                                <div class="quick-box">

                                    <div class="quick-icon">

                                        👨‍💻

                                    </div>

                                    <h4 class="fw-bold text-dark">

                                        Cari Freelancer

                                    </h4>

                                    <p class="text-muted mb-0">

                                        Temukan freelancer terbaik
                                        sesuai kebutuhan project Anda

                                    </p>

                                </div>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <style>
        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 28px;
        }

        .quick-box {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
            border: 1px solid #eef2f7;
            transition: .3s;
            height: 100%;
        }

        .quick-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .08);
        }

        .quick-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .stat-card {
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .08);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('projectChart');

        new Chart(ctx, {

            type: 'doughnut',

            data: {

                labels: [

                    'Open',
                    'In Progress',
                    'Completed'

                ],

                datasets: [{

                    data: [

                        {{ $openProjects }},
                        {{ $activeProjects }},
                        {{ $completedProjects }}

                    ],

                    backgroundColor: [

                        '#22c55e',
                        '#f59e0b',
                        '#3b82f6'

                    ],

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '70%',

                plugins: {

                    legend: {

                        position: 'bottom'

                    }

                }

            }

        });

    </script>


@endsection