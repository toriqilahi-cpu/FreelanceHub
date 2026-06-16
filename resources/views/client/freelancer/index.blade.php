@extends('layouts.app')

@section('content')

    <div class="container py-5">

        {{-- HEADER --}}
        <div class="card border-0 shadow-sm rounded-5 overflow-hidden mb-5">

            <div class="p-5 text-white" style="background:linear-gradient(135deg,#2563eb,#14b8a6);">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <h1 class="fw-bold mb-3">

                            Cari Freelancer Terbaik 👨‍💻

                        </h1>

                        <p class="fs-5 mb-0">

                            Temukan freelancer profesional sesuai kebutuhan project Anda.

                        </p>

                    </div>

                    <div class="col-lg-4 text-center">

                        <div style="font-size:90px;opacity:.25;">

                            🔍

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

                @foreach($topFreelancers as $top)

                    <div class="col-md-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-5 h-100">

                            <div class="card-body text-center p-4">

                                @if(optional($top->freelancerProfile)->photo)

                                    <img src="{{ asset('storage/' . $top->freelancerProfile->photo) }}" class="rounded-circle mb-3"
                                        width="90" height="90" style="object-fit:cover;">

                                @else

                                    <img src="https://ui-avatars.com/api/?name={{ $top->name }}" class="rounded-circle mb-3">

                                @endif

                                <h5 class="fw-bold">

                                    {{ $top->name }}

                                </h5>

                                <p class="text-success">

                                    {{ optional($top->freelancerProfile)->title }}

                                </p>

                                <a href="{{ route('client.freelancer.show', $top->id) }}"
                                    class="btn btn-outline-primary rounded-pill">

                                    Lihat Profil

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- SEARCH --}}
        <div class="card border-0 shadow-sm rounded-4 mb-5">

            <div class="card-body p-4">

                <form method="GET" action="{{ route('client.freelancers.index') }}">

                    <div class="input-group input-group-lg">

                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama atau skill freelancer..." value="{{ request('search') }}">

                        <button class="btn btn-primary px-4">

                            Cari

                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- LIST FREELANCER --}}
        <div class="row">

            @forelse($freelancers as $freelancer)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 shadow-sm rounded-5 h-100 freelancer-card">

                        <div class="card-body text-center p-4">

                            @if(optional($freelancer->freelancerProfile)->photo)

                                <img src="{{ asset('storage/' . $freelancer->freelancerProfile->photo) }}"
                                    class="rounded-circle shadow-sm mb-3" width="110" height="110" style="object-fit:cover;">

                            @else

                                <img src="https://ui-avatars.com/api/?name={{ $freelancer->name }}&size=150"
                                    class="rounded-circle shadow-sm mb-3">

                            @endif

                            <h4 class="fw-bold">

                                {{ $freelancer->name }}

                            </h4>

                            <p class="text-success fw-semibold">

                                {{ optional($freelancer->freelancerProfile)->title }}

                            </p>

                            <p class="text-muted mb-3">

                                📍 {{ optional($freelancer->freelancerProfile)->location }}

                            </p>

                            @if(optional($freelancer->freelancerProfile)->skills)

                                <div class="mb-3">

                                    @foreach(array_slice(explode(',', $freelancer->freelancerProfile->skills), 0, 3) as $skill)

                                        <span class="badge bg-light text-dark border me-1">

                                            {{ trim($skill) }}

                                        </span>

                                    @endforeach

                                </div>

                            @endif

                            <a href="{{ route('client.freelancer.show', $freelancer->id) }}"
                                class="btn btn-primary rounded-pill px-4">

                                Lihat Profil

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning rounded-4">

                        Freelancer tidak ditemukan.

                    </div>

                </div>

            @endforelse

        </div>

        <div class="mt-4">

            {{ $freelancers->links() }}

        </div>

    </div>

    <style>
        .freelancer-card {
            transition: .3s;
        }

        .freelancer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12) !important;
        }
    </style>

@endsection