@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Beri Review Freelancer
    </h2>

    <div class="card">
        <div class="card-body">

            <form
                action="{{ route('review.store') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="project_id"
                    value="{{ $project->id }}">

                <input
                    type="hidden"
                    name="freelancer_id"
                    value="{{ $project->proposals()->where('status','accepted')->first()->freelancer_id }}">

                <div class="mb-3">

                    <label class="form-label">
                        Rating
                    </label>

                    <select
                        name="rating"
                        class="form-control"
                        required>

                        <option value="">Pilih Rating</option>

                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Review
                    </label>

                    <textarea
                        name="review"
                        rows="5"
                        class="form-control"
                        required></textarea>

                </div>

                <button
                    class="btn btn-success">

                    Kirim Review

                </button>

            </form>

        </div>
    </div>

</div>

@endsection