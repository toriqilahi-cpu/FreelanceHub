@extends('layouts.app')

@section('content')

<h1 class="fw-bold mb-4">

    Proposal Saya

</h1>

<div class="row">

@foreach($proposals as $proposal)

<div class="col-lg-6 mb-4">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <h4>

                {{ $proposal->project->title }}

            </h4>

            <h5 class="text-success">

                Rp {{ number_format($proposal->bid_amount,0,',','.') }}

            </h5>

            <hr>

            @if($proposal->status=='accepted')

                <span class="badge bg-success">
                    Diterima
                </span>

            @elseif($proposal->status=='rejected')

                <span class="badge bg-danger">
                    Ditolak
                </span>

            @else

                <span class="badge bg-warning">
                    Menunggu
                </span>

            @endif

        </div>

    </div>

</div>

@endforeach

</div>

@endsection