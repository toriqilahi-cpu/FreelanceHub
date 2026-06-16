@extends('layouts.app')

@section('content')

<div class="container">

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-body p-4">

        <h2 class="fw-bold mb-4">

            ✏ Edit Project

        </h2>

        <form action="{{ route('projects.update',$project->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Judul Project

                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $project->title }}">

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5">{{ $project->description }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Budget

                </label>

                <input type="number"
                       name="budget"
                       class="form-control"
                       value="{{ $project->budget }}">

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deadline

                </label>

                <input type="date"
                       name="deadline"
                       class="form-control"
                       value="{{ $project->deadline }}">

            </div>

            <div class="d-flex gap-2">

                <button
                    class="btn btn-success rounded-pill px-4">

                    💾 Update Project

                </button>

                <a href="{{ route('projects.index') }}"
                   class="btn btn-secondary rounded-pill px-4">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
