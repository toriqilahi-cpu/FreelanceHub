@extends('layouts.app')

@section('content')

<section class="hero-modern">

<div class="row align-items-center">

<div class="col-md-6">

<span class="badge bg-success mb-3">

Marketplace Freelancer Indonesia

</span>

<h1 class="display-4 fw-bold">

Temukan Freelancer Terbaik
Untuk Project Anda

</h1>

<p class="lead text-muted mt-3">

Hubungkan Client dan Freelancer
dalam satu platform modern.

</p>

<div class="mt-4">

<a href="{{ route('register') }}"
class="btn btn-success btn-lg me-2">

Mulai Sekarang

</a>

<a href="{{ route('login') }}"
class="btn btn-outline-primary btn-lg">

Login

</a>

</div>

</div>

<div class="col-md-6 text-center">

<img
src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="350">

</div>

</div>

</section>

@endsection