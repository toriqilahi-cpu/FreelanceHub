@extends('layouts.app')

@section('content')

<h2>Kirim Proposal</h2>

<div class="card">

    <div class="card-body">

        <h4>{{ $project->title }}</h4>

        <p>{{ $project->description }}</p>

        <form action="{{ route('proposal.store') }}"
              method="POST">

            @csrf

            <input type="hidden"
                   name="project_id"
                   value="{{ $project->id }}">

            <div class="mb-3">

                <label>Penawaran Harga</label>

                <input type="number"
                       name="bid_amount"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Cover Letter</label>

                <textarea
                    name="cover_letter"
                    class="form-control"
                    rows="5"></textarea>

            </div>

            <button class="btn btn-success">

                Kirim Proposal

            </button>

        </form>

    </div>

</div>

@endsection