@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="card border-0 shadow-lg rounded-5 overflow-hidden">

    @if($portfolio->image)

        <img
            src="{{ asset('storage/'.$portfolio->image) }}"
            class="card-img-top"
            style="height:450px;object-fit:cover;">

    @endif

    <div class="card-body p-5">

        <h1 class="fw-bold mb-3">

            {{ $portfolio->title }}

        </h1>

        <p class="text-muted">

            Dibuat oleh
            <strong>{{ $portfolio->user->name }}</strong>

        </p>

        <hr>

        <h4 class="fw-bold mb-3">

            Deskripsi Project

        </h4>

        <p>

            {{ $portfolio->description }}

        </p>

        <div class="mt-4">

            @if($portfolio->demo_url)

                <a href="{{ $portfolio->demo_url }}"
                   target="_blank"
                   class="btn btn-primary rounded-pill me-2">

                    🌐 Demo Project

                </a>

            @endif

            @if($portfolio->github_url)

                <a href="{{ $portfolio->github_url }}"
                   target="_blank"
                   class="btn btn-dark rounded-pill">

                    💻 Github Repository

                </a>

            @endif

        </div>

    </div>

</div>

</div>

@endsection
