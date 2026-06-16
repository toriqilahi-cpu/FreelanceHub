@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h2 class="fw-bold mb-4">

                Edit Portfolio

            </h2>

            <form
                action="{{ route('portfolio.update',$portfolio->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Judul Project

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ $portfolio->title }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        required>{{ $portfolio->description }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Demo URL

                    </label>

                    <input
                        type="url"
                        name="demo_url"
                        class="form-control"
                        value="{{ $portfolio->demo_url }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Github URL

                    </label>

                    <input
                        type="url"
                        name="github_url"
                        class="form-control"
                        value="{{ $portfolio->github_url }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Gambar Baru

                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control">

                </div>

                <button
                    class="btn btn-primary">

                    Simpan Perubahan

                </button>

                <a
                    href="{{ route('portfolio.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection