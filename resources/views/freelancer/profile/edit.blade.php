@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="card shadow">

<div class="card-body">

<h3 class="mb-4">

Edit Profil Freelancer

</h3>

<form action="{{ route('freelancer.profile.update') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Foto Profil</label>
<input type="file"
       name="photo"
       class="form-control">
</div>

<div class="mb-3">
<label>Profesi</label>
<input type="text"
       name="title"
       class="form-control"
       value="{{ $profile->title }}">
</div>

<div class="mb-3">
<label>Bio</label>
<textarea name="bio"
          class="form-control"
          rows="5">{{ $profile->bio }}</textarea>
</div>

<div class="mb-3">
<label>Skills</label>
<textarea name="skills"
          class="form-control">{{ $profile->skills }}</textarea>
</div>

<div class="mb-3">
<label>Tarif Per Jam</label>
<input type="number"
       name="hourly_rate"
       class="form-control"
       value="{{ $profile->hourly_rate }}">
</div>

<div class="mb-3">
<label>Lokasi</label>
<input type="text"
       name="location"
       class="form-control"
       value="{{ $profile->location }}">
</div>

<div class="mb-3">
<label>Pengalaman</label>
<input type="number"
       name="experience_year"
       class="form-control"
       value="{{ $profile->experience_year }}">
</div>

<div class="mb-3">
<label>Pendidikan</label>
<input type="text"
       name="education"
       class="form-control"
       value="{{ $profile->education }}">
</div>

<div class="mb-3">
<label>Portfolio URL</label>
<input type="text"
       name="portfolio_url"
       class="form-control"
       value="{{ $profile->portfolio_url }}">
</div>

<div class="mb-3">
<label>Github URL</label>
<input type="text"
       name="github_url"
       class="form-control"
       value="{{ $profile->github_url }}">
</div>

<div class="mb-3">
<label>LinkedIn URL</label>
<input type="text"
       name="linkedin_url"
       class="form-control"
       value="{{ $profile->linkedin_url }}">
</div>

<div class="mb-3">
<label>Status</label>

<select name="availability"
        class="form-control">

<option value="Available">
Available
</option>

<option value="Busy">
Busy
</option>

</select>

</div>

<button class="btn btn-success">

Simpan Profil

</button>

</form>

</div>

</div>

</div>

@endsection