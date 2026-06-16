@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header">

            <h4>

                Chat dengan {{ $user->name }}

            </h4>

        </div>

        <div class="card-body">

            @foreach($messages as $message)

                <div class="mb-3">

                    <strong>

                        {{ $message->sender->name }}

                    </strong>

                    :

                    {{ $message->message }}

                </div>

            @endforeach

        </div>

        <div class="card-footer">

            <form
                action="{{ route('chat.send') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="receiver_id"
                    value="{{ $user->id }}">

                <div class="input-group">

                    <input
                        type="text"
                        name="message"
                        class="form-control"
                        placeholder="Tulis pesan..."
                        required>

                    <button
                        class="btn btn-primary">

                        Kirim

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection