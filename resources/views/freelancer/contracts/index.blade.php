@extends('layouts.app')

@section('content')

<h1 class="fw-bold mb-4">

    Kontrak Saya

</h1>

<div class="row">

@foreach($contracts as $contract)

<div class="col-lg-6 mb-4">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <h4>

                {{ $contract->project->title }}

            </h4>

            <hr>

            @if($contract->status=='active')

                <span class="badge bg-warning">

                    Sedang Berjalan

                </span>

            @elseif($contract->status=='completed')

                <span class="badge bg-success">

                    Selesai

                </span>

            @endif

            <div class="mt-3">

                @if($contract->status=='active')

                <form
                    action="{{ route('contracts.complete',$contract->id) }}"
                    method="POST">

                    @csrf

                    <button class="btn btn-success">

                        Tandai Selesai

                    </button>

                </form>

                @endif

            </div>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection