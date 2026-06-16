@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <div>

        <h1 class="fw-bold">
            Cari Project
        </h1>

        <p class="text-muted">
            Temukan pekerjaan terbaik sesuai skill Anda
        </p>

    </div>

</div>

<div class="row">

@foreach($projects as $project)

<div class="col-lg-6 mb-4">

    <div class="card shadow-sm border-0 rounded-4 h-100">

        <div class="card-body">

            <h4 class="fw-bold">

                {{ $project->title }}

            </h4>

            <p class="text-muted">

                Deadline :
                {{ $project->deadline }}

            </p>

            <h3 class="text-success">

                Rp {{ number_format($project->budget,0,',','.') }}

            </h3>

            <hr>

            <a href="{{ route('proposal.create',$project->id) }}"
               class="btn btn-primary">

                Kirim Proposal

            </a>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection