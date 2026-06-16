@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold mb-2">
                Project Saya
            </h1>

            <p class="text-muted mb-0">
                Kelola seluruh project yang Anda buat
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('projects.pdf') }}" class="btn btn-danger rounded-pill px-4">

                <i class="bi bi-file-earmark-pdf-fill"></i>
                Export PDF

            </a>

            <a href="{{ route('projects.excel') }}" class="btn btn-success rounded-pill px-4">

                <i class="bi bi-file-earmark-excel-fill"></i>
                Export Excel

            </a>

            <a href="{{ route('projects.create') }}" class="btn btn-success rounded-pill px-4">

                <i class="bi bi-plus-lg"></i>
                Tambah Project

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm border-0">

            {{ session('success') }}

        </div>

    @endif

    {{-- SEARCH & FILTER --}}
    <form method="GET" class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-5">

                    <input type="text" name="search" class="form-control" placeholder="🔍 Cari Project..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-3">

                    <select name="status" class="form-select">

                        <option value="">
                            Semua Status
                        </option>

                        <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>

                            Open

                        </option>

                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>

                            In Progress

                        </option>

                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>

                            Completed

                        </option>

                    </select>

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">

                        Cari

                    </button>

                </div>

                <div class="col-md-2">

                    <a href="{{ route('projects.index') }}" class="btn btn-secondary w-100">

                        Reset

                    </a>

                </div>

            </div>

        </div>

    </form>

    <div class="row">

        @forelse($projects as $project)

            <div class="col-lg-6 mb-4">

                <div class="card border-0 shadow-lg rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between">

                            <div>

                                <h4 class="fw-bold">

                                    {{ $project->title }}

                                </h4>

                                <p class="text-muted">

                                    Deadline:
                                    {{ $project->deadline }}

                                </p>

                            </div>

                            <div>

                                @if($project->status == 'open')

                                    <span class="badge bg-success px-3 py-2">

                                        Open

                                    </span>

                                @elseif($project->status == 'in_progress')

                                    <span class="badge bg-warning px-3 py-2">

                                        In Progress

                                    </span>

                                @elseif($project->status == 'completed')

                                    <span class="badge bg-primary px-3 py-2">

                                        Completed

                                    </span>

                                @else

                                    <span class="badge bg-danger px-3 py-2">

                                        Cancelled

                                    </span>

                                @endif

                            </div>

                        </div>

                        <hr>

                        <h3 class="fw-bold text-success mb-3">

                            Rp {{ number_format($project->budget, 0, ',', '.') }}

                        </h3>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{ route('project.proposals', $project->id) }}" class="btn btn-primary rounded-pill">

                                📄 Proposal

                            </a>

                            @if($project->status == 'completed')

                                <a href="{{ route('review.create', $project->id) }}" class="btn btn-success rounded-pill">

                                    ⭐ Review

                                </a>

                            @endif

                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning rounded-pill">

                                ✏ Edit

                            </a>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Hapus project ini?')" class="btn btn-danger rounded-pill">

                                    🗑 Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center py-5">

                        <h3 class="fw-bold">

                            Belum Ada Project

                        </h3>

                        <p class="text-muted">

                            Silakan buat project pertama Anda

                        </p>

                        <a href="{{ route('projects.create') }}" class="btn btn-success rounded-pill">

                            + Tambah Project

                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

    </div>

@endsection