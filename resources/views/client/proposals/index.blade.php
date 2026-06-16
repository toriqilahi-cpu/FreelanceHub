@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-5">

        <h1 class="fw-bold">
            Proposal Masuk
        </h1>

        <p class="text-muted">
            Project :
            {{ $project->title }}
        </p>

    </div>

    <div class="row">

        @forelse($proposals as $proposal)

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">

                        <div class="d-flex align-items-center">

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($proposal->freelancer->name) }}&background=14b8a6&color=fff&size=128"
                                class="rounded-circle me-3"
                                width="65"
                                height="65">

                            <div>

                                <h5 class="fw-bold mb-1">

                                    {{ $proposal->freelancer->name }}

                                </h5>

                                <small class="text-muted">

                                    Freelancer

                                </small>

                                <br>

                                <a href="{{ route('client.freelancer.show',$proposal->freelancer_id) }}"
                                   class="btn btn-outline-primary btn-sm mt-2">

                                    <i class="bi bi-person"></i>

                                    Lihat Profil

                                </a>

                            </div>

                        </div>

                        <div>

                            @if($proposal->status == 'pending')

                                <span class="badge bg-warning px-3 py-2">

                                    Pending

                                </span>

                            @elseif($proposal->status == 'accepted')

                                <span class="badge bg-success px-3 py-2">

                                    Accepted

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Rejected

                                </span>

                            @endif

                        </div>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <h4 class="text-success fw-bold">

                            Rp {{ number_format($proposal->bid_amount,0,',','.') }}

                        </h4>

                    </div>

                    <div class="mb-4">

                        <label class="fw-semibold mb-2">

                            Cover Letter

                        </label>

                        <div class="bg-light rounded-3 p-3">

                            {{ $proposal->cover_letter }}

                        </div>

                    </div>

                    @if($proposal->status == 'pending')

                        <form
                            action="{{ route('proposal.accept',$proposal->id) }}"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-success rounded-pill px-4">

                                ✓ Terima Freelancer

                            </button>

                        </form>

                    @elseif($proposal->status == 'accepted')

                        <button
                            class="btn btn-success rounded-pill"
                            disabled>

                            Freelancer Terpilih

                        </button>

                    @else

                        <button
                            class="btn btn-danger rounded-pill"
                            disabled>

                            Proposal Ditolak

                        </button>

                    @endif

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body text-center py-5">

                    <h3 class="fw-bold">

                        Belum Ada Proposal

                    </h3>

                    <p class="text-muted">

                        Freelancer belum mengirim proposal untuk project ini

                    </p>

                </div>

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection