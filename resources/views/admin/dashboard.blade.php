@extends('layouts.app')

@section('content')

<div class="container py-4">

<h1 class="fw-bold mb-4">

    Admin Dashboard

</h1>

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>👥</h1>

                <h3>{{ $totalUsers }}</h3>

                <p class="text-muted mb-0">

                    Total User

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>🏢</h1>

                <h3>{{ $totalClients }}</h3>

                <p class="text-muted mb-0">

                    Client

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>🧑‍💻</h1>

                <h3>{{ $totalFreelancers }}</h3>

                <p class="text-muted mb-0">

                    Freelancer

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>📁</h1>

                <h3>{{ $totalProjects }}</h3>

                <p class="text-muted mb-0">

                    Project

                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>📄</h1>

                <h3>{{ $totalProposals }}</h3>

                <p class="text-muted mb-0">

                    Proposal

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>🤝</h1>

                <h3>{{ $totalContracts }}</h3>

                <p class="text-muted mb-0">

                    Contract

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <h1>⭐</h1>

                <h3>{{ $totalReviews }}</h3>

                <p class="text-muted mb-0">

                    Review

                </p>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <h3 class="fw-bold mb-4">

            Statistik Sistem

        </h3>

        <canvas id="adminChart"></canvas>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
    document.getElementById('adminChart'),
    {
        type: 'bar',
        data: {
            labels: [
                'Client',
                'Freelancer',
                'Project',
                'Proposal',
                'Contract',
                'Review'
            ],
            datasets: [{
                data: [
                    {{ $totalClients }},
                    {{ $totalFreelancers }},
                    {{ $totalProjects }},
                    {{ $totalProposals }},
                    {{ $totalContracts }},
                    {{ $totalReviews }}
                ]
            }]
        }
    }
);

</script>

@endsection
