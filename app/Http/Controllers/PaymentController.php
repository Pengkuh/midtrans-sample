<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $harga = 10;
        return view('form', ['harga' => $harga]);
    }
    protected function store(Request $request)
    {
        // dd($request->all());
        \Midtrans\Config::$serverKey = 'SB-Mid-server-bCGNmoouKfCGY1GTgage6Y5T';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->biaya,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('page', ['snapToken' => $snapToken]);
    }

    public function callBack(Request $request)
    {
        $serverKey = 'SB-Mid-server-bCGNmoouKfCGY1GTgage6Y5T';
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);


        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                print_r($request->all());
            }
        }
    }

    public function notif(Request $request)
    {
        $data =   ((json_decode(stripslashes($request->json), true)));

        // $data = explode(',', $request->json);


        print_r($data['status_code']);
        dd($data);
        return view('notif', ['data' => $data]);
    }
}
