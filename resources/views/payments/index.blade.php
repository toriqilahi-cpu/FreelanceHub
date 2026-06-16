@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h1 class="fw-bold mb-4">

        Pembayaran Project

    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Invoice</th>
                        <th>Project</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($payments as $payment)

                    <tr>

                        <td>

                            {{ $payment->midtrans_order_id }}

                        </td>

                        <td>

                            {{ $payment->contract->project->title ?? '-' }}

                        </td>

                        <td>

                            Rp {{ number_format($payment->amount,0,',','.') }}

                        </td>

                        <td>

                            @if($payment->status == 'pending')

                                <span class="badge bg-warning">

                                    Pending

                                </span>

                            @elseif($payment->status == 'paid')

                                <span class="badge bg-success">

                                    Paid

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Failed

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($payment->status == 'pending')

                            <form
                                action="{{ route('payments.pay',$payment->id) }}"
                                method="POST">

                                @csrf

                                <button
                                    class="btn btn-success btn-sm">

                                    Bayar

                                </button>

                            </form>

                            @else

                                <span class="text-success fw-bold">

                                    Lunas

                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection