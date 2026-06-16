@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="fw-bold mb-4">

        Kelola Project

    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <table class="table">

                <thead>

                    <tr>

                        <th>Judul</th>
                        <th>Client</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($projects as $project)

                        <tr>

                            <td>

                                {{ $project->title }}

                            </td>

                            <td>

                                {{ $project->client->name }}

                            </td>

                            <td>

                                Rp {{ number_format($project->budget,0,',','.') }}

                            </td>

                            <td>

                                {{ $project->status }}

                            </td>

                            <td>

                                <form
                                    action="{{ route('admin.projects.destroy',$project->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus project?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection