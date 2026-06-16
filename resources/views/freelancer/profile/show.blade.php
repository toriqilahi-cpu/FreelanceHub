@extends('layouts.app')

@section('content')

    <div class="container py-5">

        {{-- HEADER PROFILE --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">

            <div class="bg-dark" style="height:120px;"></div>

            <div class="card-body p-5">

                <div class="row align-items-center">

                    <div class="col-md-3 text-center">

                        @if($profile->photo)

                            <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle shadow" width="180"
                                height="180" style="object-fit:cover;margin-top:-120px;border:6px solid white;">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-circle shadow"
                                width="180" height="180" style="margin-top:-120px;border:6px solid white;">

                        @endif

                    </div>

                    @extends('layouts.app')

                    @section('content')

                        <div class="container py-5">

                            {{-- HEADER PROFILE --}}
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">

                                <div class="bg-dark" style="height:120px;"></div>

                                <div class="card-body p-5">

                                    <div class="row align-items-center">

                                        <div class="col-md-3 text-center">

                                            @if($profile->photo)

                                                <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle shadow"
                                                    width="180" height="180"
                                                    style="object-fit:cover;margin-top:-120px;border:6px solid white;">

                                            @else

                                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                                    class="rounded-circle shadow" width="180" height="180"
                                                    style="margin-top:-120px;border:6px solid white;">

                                            @endif

                                        </div>

                                        <div class="col-md-9">

                                            <div class="d-flex justify-content-between align-items-start flex-wrap">

                                                <div>

                                                    <h1 class="fw-bold mb-1">

                                                        {{ auth()->user()->name }}

                                                    </h1>

                                                    <h4 class="text-success">

                                                        {{ $profile->title ?? 'Freelancer' }}

                                                    </h4>

                                                    <p class="text-muted mb-2">

                                                        {{ $profile->location ?? 'Lokasi belum diisi' }}

                                                    </p>

                                                    <h5 class="text-warning mb-1">

                                                        ⭐ {{ number_format($averageRating ?? 0, 1) }}

                                                    </h5>

                                                    <p class="text-muted">

                                                        {{ $totalReviews ?? 0 }} Review

                                                    </p>

                                                    <div class="row mt-4 g-3">

                                                        <div class="col-md-3">

                                                            <div class="card border-0 shadow-sm rounded-4 stat-card">

                                                                <div class="card-body text-center">

                                                                    <div style="font-size:40px">⭐</div>

                                                                    <h2 class="fw-bold text-warning">

                                                                        {{ number_format($averageRating ?? 0, 1) }}

                                                                    </h2>

                                                                    <small class="text-muted">

                                                                        Rating

                                                                    </small>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="card border-0 shadow-sm rounded-4 stat-card">

                                                                <div class="card-body text-center">

                                                                    <div style="font-size:40px">📝</div>

                                                                    <h2 class="fw-bold">

                                                                        {{ $totalReviews }}

                                                                    </h2>

                                                                    <small class="text-muted">

                                                                        Review

                                                                    </small>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="card border-0 shadow-sm rounded-4 stat-card">

                                                                <div class="card-body text-center">

                                                                    <div style="font-size:40px">📁</div>

                                                                    <h2 class="fw-bold text-primary">

                                                                        {{ $totalPortfolio }}

                                                                    </h2>

                                                                    <small class="text-muted">

                                                                        Portfolio

                                                                    </small>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="card border-0 shadow-sm rounded-4 stat-card">

                                                                <div class="card-body text-center">

                                                                    <div style="font-size:40px">🚀</div>

                                                                    <h2 class="fw-bold text-success">

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

                                                <div>

                                                    <a href="{{ route('freelancer.profile.edit') }}"
                                                        class="btn btn-dark rounded-pill px-4">

                                                        Edit Profil

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- KONTEN PROFILE --}}
                            <div class="row">

                                <div class="col-lg-8">

                                    {{-- Tentang Saya --}}
                                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                                        <div class="card-body p-4">

                                            <h3 class="fw-bold mb-3">

                                                Tentang Saya

                                            </h3>

                                            <p class="text-muted">

                                                {{ $profile->bio ?? 'Belum ada deskripsi.' }}

                                            </p>

                                        </div>

                                    </div>

                                    {{-- Keahlian --}}
                                    <div class="card border-0 shadow-sm rounded-4">

                                        <div class="card-body p-4">

                                            <h3 class="fw-bold mb-3">

                                                Keahlian

                                            </h3>

                                            @if($profile->skills)

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

                                </div>

                                <div class="col-lg-4">

                                    {{-- Informasi Freelancer --}}
                                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                                        <div class="card-body p-4">

                                            <h4 class="fw-bold mb-4">

                                                Informasi Freelancer

                                            </h4>

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>Pengalaman</td>
                                                    <td>
                                                        <strong>
                                                            {{ $profile->experience_year ?? 0 }} Tahun
                                                        </strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pendidikan</td>
                                                    <td>
                                                        <strong>
                                                            {{ $profile->education ?? '-' }}
                                                        </strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Tarif</td>
                                                    <td>
                                                        <strong>
                                                            Rp {{ number_format($profile->hourly_rate ?? 0, 0, ',', '.') }}/Jam
                                                        </strong>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Status</td>
                                                    <td>

                                                        <span class="badge bg-success">

                                                            {{ $profile->availability ?? 'Available' }}

                                                        </span>

                                                    </td>
                                                </tr>

                                            </table>

                                        </div>

                                    </div>

                                    {{-- Sosial Media --}}
                                    <div class="card border-0 shadow-sm rounded-4">

                                        <div class="card-body p-4">

                                            <h4 class="fw-bold mb-3">

                                                Portfolio & Sosial Media

                                            </h4>

                                            @if($profile->portfolio_url)

                                                <a href="{{ $profile->portfolio_url }}" target="_blank"
                                                    class="btn btn-dark w-100 mb-2">

                                                    Portfolio

                                                </a>

                                            @endif

                                            @if($profile->github_url)

                                                <a href="{{ $profile->github_url }}" target="_blank"
                                                    class="btn btn-secondary w-100 mb-2">

                                                    Github

                                                </a>

                                            @endif

                                            @if($profile->linkedin_url)

                                                <a href="{{ $profile->linkedin_url }}" target="_blank"
                                                    class="btn btn-primary w-100">

                                                    LinkedIn

                                                </a>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- PORTFOLIO --}}
                            <div class="card border-0 shadow-sm rounded-4 mt-4">

                                <div class="card-body p-4">

                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <h2 class="fw-bold">

                                            Portfolio Saya

                                        </h2>

                                        <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-lg rounded-pill">

                                            + Tambah Portfolio

                                        </a>

                                    </div>
                                    <div class="row">

                                        @forelse($portfolios as $portfolio)

                                            <div class="col-lg-4 col-md-6 mb-4">

                                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                                    @if($portfolio->image)

                                                        <img src="{{ asset('storage/' . $portfolio->image) }}" class="card-img-top"
                                                            style="height:220px;object-fit:cover;">

                                                    @else

                                                        <img src="https://via.placeholder.com/600x400?text=Portfolio"
                                                            class="card-img-top" style="height:220px;object-fit:cover;">

                                                    @endif

                                                    <div class="card-body d-flex flex-column">

                                                        <h5 class="fw-bold mb-2">

                                                            {{ $portfolio->title }}

                                                        </h5>

                                                        <p class="text-muted small flex-grow-1">

                                                            {{ \Illuminate\Support\Str::limit($portfolio->description, 120) }}

                                                        </p>

                                                        <div class="mb-3">

                                                            @if($portfolio->demo_url)

                                                                <a href="{{ $portfolio->demo_url }}" target="_blank"
                                                                    class="btn btn-outline-dark btn-sm">

                                                                    Demo

                                                                </a>

                                                            @endif

                                                            @if($portfolio->github_url)

                                                                <a href="{{ $portfolio->github_url }}" target="_blank"
                                                                    class="btn btn-outline-secondary btn-sm">

                                                                    Github

                                                                </a>

                                                            @endif

                                                        </div>

                                                        <div class="d-flex gap-2">

                                                            <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                                                class="btn btn-warning flex-fill">

                                                                ✏ Edit

                                                            </a>

                                                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                                                method="POST" class="flex-fill">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn btn-danger w-100"
                                                                    onclick="return confirm('Yakin hapus portfolio?')">

                                                                    🗑 Hapus

                                                                </button>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @empty

                                            <div class="col-12">

                                                <div class="text-center py-5">

                                                    <h4>Belum Ada Portfolio</h4>

                                                    <p class="text-muted">

                                                        Tambahkan project terbaik Anda

                                                    </p>

                                                </div>

                                            </div>

                                        @endforelse

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endsection

                </div>

            </div>

        </div>

        {{-- KONTEN PROFILE --}}
        <div class="row">

            <div class="col-lg-8">

                {{-- Tentang Saya --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">

                            Tentang Saya

                        </h3>

                        <p class="text-muted">

                            {{ $profile->bio ?? 'Belum ada deskripsi.' }}

                        </p>

                    </div>

                </div>

                {{-- Keahlian --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">

                            Keahlian

                        </h3>

                        @if($profile->skills)

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

            </div>

            <div class="col-lg-4">

                {{-- Informasi Freelancer --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">

                            Informasi Freelancer

                        </h4>

                        <table class="table table-borderless">

                            <tr>
                                <td>Pengalaman</td>
                                <td>
                                    <strong>
                                        {{ $profile->experience_year ?? 0 }} Tahun
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td>Pendidikan</td>
                                <td>
                                    <strong>
                                        {{ $profile->education ?? '-' }}
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td>Tarif</td>
                                <td>
                                    <strong>
                                        Rp {{ number_format($profile->hourly_rate ?? 0, 0, ',', '.') }}/Jam
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>

                                    <span class="badge bg-success">

                                        {{ $profile->availability ?? 'Available' }}

                                    </span>

                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

                {{-- Sosial Media --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-3">

                            Portfolio & Sosial Media

                        </h4>

                        @if($profile->portfolio_url)

                            <a href="{{ $profile->portfolio_url }}" target="_blank" class="btn btn-dark w-100 mb-2">

                                Portfolio

                            </a>

                        @endif

                        @if($profile->github_url)

                            <a href="{{ $profile->github_url }}" target="_blank" class="btn btn-secondary w-100 mb-2">

                                Github

                            </a>

                        @endif

                        @if($profile->linkedin_url)

                            <a href="{{ $profile->linkedin_url }}" target="_blank" class="btn btn-primary w-100">

                                LinkedIn

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        {{-- PORTFOLIO --}}
        <div class="card border-0 shadow-sm rounded-4 mt-4">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold">

                        Portfolio Saya

                    </h2>

                    <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-lg rounded-pill">

                        + Tambah Portfolio

                    </a>

                </div>
                <div class="row">

                    @forelse($portfolios as $portfolio)

                        <div class="col-lg-4 col-md-6 mb-4">

                            <div class="card border-0 shadow-sm rounded-4 h-100">

                                @if($portfolio->image)

                                    <img src="{{ asset('storage/' . $portfolio->image) }}" class="card-img-top"
                                        style="height:220px;object-fit:cover;">

                                @else

                                    <img src="https://via.placeholder.com/600x400?text=Portfolio" class="card-img-top"
                                        style="height:220px;object-fit:cover;">

                                @endif

                                <div class="card-body d-flex flex-column">

                                    <h5 class="fw-bold mb-2">

                                        {{ $portfolio->title }}

                                    </h5>

                                    <p class="text-muted small flex-grow-1">

                                        {{ \Illuminate\Support\Str::limit($portfolio->description, 120) }}

                                    </p>

                                    <div class="mb-3">

                                        @if($portfolio->demo_url)

                                            <a href="{{ $portfolio->demo_url }}" target="_blank"
                                                class="btn btn-outline-dark btn-sm">

                                                Demo

                                            </a>

                                        @endif

                                        @if($portfolio->github_url)

                                            <a href="{{ $portfolio->github_url }}" target="_blank"
                                                class="btn btn-outline-secondary btn-sm">

                                                Github

                                            </a>

                                        @endif

                                    </div>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                            class="btn btn-warning flex-fill">

                                            ✏ Edit

                                        </a>

                                        <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST"
                                            class="flex-fill">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger w-100"
                                                onclick="return confirm('Yakin hapus portfolio?')">

                                                🗑 Hapus

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="text-center py-5">

                                <h4>Belum Ada Portfolio</h4>

                                <p class="text-muted">

                                    Tambahkan project terbaik Anda

                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

@endsection