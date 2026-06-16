<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(
            'contract.project'
        )->get();

        return view(
            'payments.index',
            compact('payments')
        );
    }

  public function pay(Payment $payment)
{
    $payment->update([
        'status' => 'paid'
    ]);

    \App\Models\Notification::create([

        'user_id' =>
            $payment->contract->freelancer_id,

        'title' =>
            'Pembayaran Diterima',

        'message' =>
            'Client telah melakukan pembayaran untuk project "' .
            $payment->contract->project->title . '"'

    ]);

    return back()->with(
        'success',
        'Pembayaran berhasil dilakukan'
    );
}

}