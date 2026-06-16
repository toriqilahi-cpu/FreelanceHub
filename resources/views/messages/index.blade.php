@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                💬 Inbox Pesan

            </h4>

        </div>

        <div class="card-body">

            @forelse($users as $user)

                <a
                    href="{{ route('chat.show',$user->id) }}"
                    class="list-group-item list-group-item-action mb-2 rounded">

                    <strong>

                        {{ $user->name }}

                    </strong>

                </a>

            @empty

                <div class="text-center text-muted">

                    Belum ada percakapan

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection