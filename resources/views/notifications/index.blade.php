@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header">
            <h4>Notifikasi</h4>
        </div>

        <div class="card-body">

            @forelse($notifications as $notification)

                <div class="alert alert-info">

                    <h6>{{ $notification->title }}</h6>

                    <p class="mb-0">
                        {{ $notification->message }}
                    </p>

                    <small class="text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>

                </div>

            @empty

                <div class="text-center text-muted">
                    Belum ada notifikasi
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection