@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Project Yang Saya Menangkan

            </h2>

            <p class="text-muted mb-0">

                Daftar project yang telah Anda menangkan dari client

            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success rounded-4">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Project</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($proposals as $proposal)

                    @php

                        $contract = \App\Models\Contract::where(
                            'project_id',
                            $proposal->project_id
                        )->first();

                    @endphp

                    <tr>

                        <td>

                            <strong>

                                {{ $proposal->project->title }}

                            </strong>

                        </td>

                        <td>

                            Rp {{ number_format($proposal->bid_amount,0,',','.') }}

                        </td>

                        <td>

                            @if(
                                $contract &&
                                $contract->payment &&
                                $contract->payment->status == 'paid'
                            )

                                <span class="badge bg-success">

                                    Payment Paid

                                </span>

                            @elseif(
                                $contract &&
                                $contract->status == 'completed'
                            )

                                <span class="badge bg-primary">

                                    Project Completed

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    Menunggu Pembayaran

                                </span>

                            @endif

                        </td>

                        <td>

                            @if(
                                $contract &&
                                $contract->payment &&
                                $contract->payment->status == 'paid' &&
                                $contract->status != 'completed'
                            )

                                <form
                                    action="{{ route('contracts.complete',$contract->id) }}"
                                    method="POST">

                                    @csrf

                                    <button
                                        class="btn btn-success btn-sm rounded-pill">

                                        ✔ Selesaikan Project

                                    </button>

                                </form>

                            @elseif(
                                $contract &&
                                $contract->status == 'completed'
                            )

                                <span class="text-success fw-bold">

                                    ✔ Selesai

                                </span>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-4">

                            Belum ada project diterima

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection