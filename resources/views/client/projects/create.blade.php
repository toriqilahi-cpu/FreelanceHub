@extends('layouts.app')

@section('content')

<h2>Buat Project</h2>

<form action="{{ route('projects.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>Judul Project</label>

        <input type="text"
               name="title"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea name="description"
                  class="form-control"></textarea>

    </div>

    <div class="mb-3">

        <label>Budget</label>

        <input type="number"
               name="budget"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Deadline</label>

        <input type="date"
               name="deadline"
               class="form-control">

    </div>

    <button class="btn btn-success">
        Simpan Project
    </button>

</form>

@endsection