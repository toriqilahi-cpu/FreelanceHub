@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                Portfolio Saya

            </h1>

            <p class="text-muted mb-0">

                Tampilkan hasil karya terbaik Anda

            </p>

        </div>

        <a href="{{ route('portfolio.create') }}"
           class="btn btn-primary btn-lg rounded-pill px-4">

            + Tambah Portfolio

        </a>

    </div>

    <div class="row">

        @forelse($portfolios as $portfolio)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

                    {{-- GAMBAR PORTFOLIO --}}
                    @if($portfolio->image)

                        <img
                            src="{{ asset('storage/'.$portfolio->image) }}"
                            class="card-img-top"
                            style="height:250px;object-fit:cover;">

                    @else

                        <img
                            src="https://via.placeholder.com/600x400?text=Portfolio"
                            class="card-img-top"
                            style="height:250px;object-fit:cover;">

                    @endif

                    <div class="card-body d-flex flex-column">

                        <h4 class="fw-bold">

                            {{ $portfolio->title }}

                        </h4>

                        <p class="text-muted flex-grow-1">

                            {{ \Illuminate\Support\Str::limit($portfolio->description,120) }}

                        </p>

                        {{-- LINK PROJECT --}}
                        <div class="mb-3">

                            @if($portfolio->demo_url)

                                <a href="{{ $portfolio->demo_url }}"
                                   target="_blank"
                                   class="btn btn-outline-dark btn-sm">

                                    Demo

                                </a>

                            @endif

                            @if($portfolio->github_url)

                                <a href="{{ $portfolio->github_url }}"
                                   target="_blank"
                                   class="btn btn-outline-secondary btn-sm">

                                    Github

                                </a>

                            @endif

                        </div>

                        {{-- TOMBOL EDIT & HAPUS --}}
                        <div class="d-flex gap-2">

                            <a href="{{ route('portfolio.edit',$portfolio->id) }}"
                               class="btn btn-warning flex-fill">

                                ✏ Edit

                            </a>

                            <form action="{{ route('portfolio.destroy',$portfolio->id) }}"
                                  method="POST"
                                  class="flex-fill">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger w-100"
                                    onclick="return confirm('Yakin ingin menghapus portfolio ini?')">

                                    🗑 Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center py-5">

                        <h3 class="fw-bold">

                            Belum Ada Portfolio

                        </h3>

                        <p class="text-muted">

                            Tambahkan project terbaik Anda

                        </p>

                        <a href="{{ route('portfolio.create') }}"
                           class="btn btn-primary rounded-pill">

                            + Tambah Portfolio Pertama

                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection