@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="card border-0 shadow-lg rounded-5">

    <div class="card-body p-5">

        <div class="d-flex justify-content-between align-items-start mb-4">

            <div>

                <h1 class="fw-bold">

                    {{ $project->title }}

                </h1>

                <p class="text-muted">

                    Dibuat oleh:
                    {{ $project->client->name }}

                </p>

            </div>

            <span class="badge bg-primary p-3">

                {{ ucfirst($project->status) }}

            </span>

        </div>

        <hr>

        <h4 class="fw-bold mb-3">

            Deskripsi Project

        </h4>

        <p>

            {{ $project->description }}

        </p>

        <div class="row mt-5">

            <div class="col-md-4">

                <div class="card border-0 bg-light rounded-4">

                    <div class="card-body text-center">

                        <h5>Budget</h5>

                        <h3 class="fw-bold text-success">

                            Rp {{ number_format($project->budget,0,',','.') }}

                        </h3>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 bg-light rounded-4">

                    <div class="card-body text-center">

                        <h5>Deadline</h5>

                        <h3 class="fw-bold">

                            {{ $project->deadline }}

                        </h3>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 bg-light rounded-4">

                    <div class="card-body text-center">

                        <h5>Proposal Masuk</h5>

                        <h3 class="fw-bold text-primary">

                            {{ $project->proposals->count() }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
