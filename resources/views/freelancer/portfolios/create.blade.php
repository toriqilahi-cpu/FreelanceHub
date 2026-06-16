@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-4">

            <h2 class="fw-bold mb-4">

                Tambah Portfolio

            </h2>

            <form
                action="{{ route('portfolio.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Judul Project

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Gambar Preview

                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Link Demo

                    </label>

                    <input
                        type="url"
                        name="demo_url"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Github

                    </label>

                    <input
                        type="url"
                        name="github_url"
                        class="form-control">

                </div>

                <button
                    class="btn btn-primary rounded-pill">

                    Simpan Portfolio

                </button>

            </form>

        </div>

    </div>

</div>

@endsection