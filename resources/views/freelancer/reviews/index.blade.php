@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-5">

        <h1 class="fw-bold">

            Review Saya

        </h1>

        <p class="text-muted">

            Semua review dari client

        </p>

    </div>

    <div class="row">

        @forelse($reviews as $review)

        <div class="col-lg-6 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between">

                        <h5 class="fw-bold">

                            Client #{{ $review->client_id }}

                        </h5>

                        <span class="badge bg-warning text-dark">

                            ⭐ {{ $review->rating }}/5

                        </span>

                    </div>

                    <hr>

                    <p class="mb-0">

                        {{ $review->review }}

                    </p>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center py-5">

                    <h4>

                        Belum Ada Review

                    </h4>

                </div>

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection