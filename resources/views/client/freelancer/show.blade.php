@extends('layouts.app')

@section('content')

    <div class="container py-5">

        {{-- HEADER PROFILE --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <div class="bg-dark" style="height:180px"></div>

            <div class="card-body px-5 pb-5">

                <div class="row">

                    <div class="col-md-3 text-center">

                        @if($profile && $profile->photo)

                            <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle shadow" width="220"
                                height="220" style="object-fit:cover;margin-top:-120px;border:6px solid white;">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="rounded-circle shadow"
                                width="220" height="220" style="margin-top:-120px;border:6px solid white;">

                        @endif

                    </div>

                    <div class="col-md-9">

                        <h1 class="fw-bold">
                            {{ $user->name }}
                        </h1>

                        <h3 class="text-success">
                            {{ $profile->title ?? 'Freelancer' }}
                        </h3>

                        <p class="text-muted">
                            📍 {{ $profile->location ?? '-' }}
                        </p>

                        <h4 class="text-warning">
                            ⭐ {{ number_format($avgRating ?? 0, 1) }}
                            ({{ $reviews->count() }} Review)
                        </h4>

                        <hr>

                        <p>
                            {{ $profile->bio ?? 'Belum ada deskripsi' }}
                        </p>
                        <div class="mt-3 mb-4">

                            <a href="{{ route('chat.show', $user->id) }}" class="btn btn-primary rounded-pill px-4">

                                💬 Chat Freelancer

                            </a>

                        </div>

                        <div class="row mt-4 g-3">

                            <div class="col-md-3">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="card-body text-center">

                                        <div style="font-size:40px">

                                            ⭐

                                        </div>

                                        <h2 class="fw-bold text-warning mb-1">

                                            {{ number_format($avgRating ?? 0, 1) }}

                                        </h2>

                                        <small class="text-muted">

                                            Rating

                                        </small>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="card-body text-center">

                                        <div style="font-size:40px">

                                            📝

                                        </div>

                                        <h2 class="fw-bold text-dark mb-1">

                                            {{ $totalReview }}

                                        </h2>

                                        <small class="text-muted">

                                            Total Review

                                        </small>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="card-body text-center">

                                        <div style="font-size:40px">

                                            📁

                                        </div>

                                        <h2 class="fw-bold text-primary mb-1">

                                            {{ $totalPortfolio }}

                                        </h2>

                                        <small class="text-muted">

                                            Portfolio

                                        </small>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="card-body text-center">

                                        <div style="font-size:40px">

                                            🚀

                                        </div>

                                        <h2 class="fw-bold text-success mb-1">

                                            {{ $totalCompletedProject }}

                                        </h2>

                                        <small class="text-muted">

                                            Project Selesai

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

        <div class="row mt-4">

            {{-- KIRI --}}
            <div class="col-lg-8">

                {{-- KEAHLIAN --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-3">
                            Keahlian
                        </h4>

                        @if($profile && $profile->skills)

                            @foreach(explode(',', $profile->skills) as $skill)

                                <span class="badge bg-primary p-2 me-2 mb-2">

                                    {{ trim($skill) }}

                                </span>

                            @endforeach

                        @else

                            <span class="text-muted">

                                Belum ada keahlian

                            </span>

                        @endif

                    </div>

                </div>

                {{-- PORTFOLIO --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Portfolio Freelancer

                        </h4>

                        <div class="row">
                            @forelse($portfolios as $portfolio)

                                <div class="col-md-6 mb-4">

                                    <div class="card border-0 shadow-sm rounded-4 h-100">

                                        @if($portfolio->image)

                                            <img src="{{ asset('storage/' . $portfolio->image) }}" class="card-img-top"
                                                style="height:220px;object-fit:cover;">

                                        @endif

                                        <div class="card-body">

                                            <h5 class="fw-bold">

                                                {{ $portfolio->title }}

                                            </h5>

                                            <p class="text-muted">

                                                {{ \Illuminate\Support\Str::limit($portfolio->description, 120) }}

                                            </p>

                                        </div>

                                        <div class="card-footer bg-white border-0 d-flex gap-2">

                                            <a href="{{ route('client.portfolio.show', $portfolio->id) }}"
                                                class="btn btn-primary flex-fill rounded-pill">

                                                👁️ Detail

                                            </a>

                                            @if($portfolio->demo_url)

                                                <a href="{{ $portfolio->demo_url }}" target="_blank"
                                                    class="btn btn-success flex-fill rounded-pill">

                                                    🌐 Demo

                                                </a>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <div class="col-12">

                                    <p class="text-muted">

                                        Freelancer belum memiliki portfolio.

                                    </p>

                                </div>

                            @endforelse



                        </div>

                    </div>

                </div>

                {{-- REVIEW --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">
                            Review Client
                        </h4>

                        @forelse($reviews as $review)

                            <div class="border-bottom pb-3 mb-3">

                                <div class="d-flex justify-content-between">

                                    <strong>
                                        {{ $review->reviewer->name ?? 'Client' }}
                                    </strong>

                                    <span class="text-warning">
                                        ⭐ {{ $review->rating }}/5
                                    </span>

                                </div>

                                <p class="mb-0 mt-2">
                                    {{ $review->comment }}
                                </p>

                            </div>

                        @empty

                            <p class="text-muted">

                                Belum ada review

                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

            {{-- KANAN --}}
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Informasi Freelancer

                        </h4>

                        <table class="table table-borderless">

                            <tr>
                                <td>Pengalaman</td>
                                <td><strong>{{ $profile->experience_year ?? 0 }} Tahun</strong></td>
                            </tr>

                            <tr>
                                <td>Pendidikan</td>
                                <td><strong>{{ $profile->education ?? '-' }}</strong></td>
                            </tr>

                            <tr>
                                <td>Tarif</td>
                                <td>
                                    <strong>
                                        Rp {{ number_format($profile->hourly_rate ?? 0, 0, ',', '.') }}/Jam
                                    </strong>
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection