<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\App;

class Checkout extends BaseController
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function index()
    {
        if (session()->get('id')) {
            $data['title'] = 'Checkout';
            return view('frontend/page/checkout', $data);
        } else {
            return redirect()->to('/login');
        }
    }

    public function checkout()
    {
        // if (session()->get('id')) {
        
        // } else {
        //     return redirect()->to('/login');
        // }
        $config = new App();
        $data['lineItems'] = [
            [
                'price_data' => [
                    'currency' => 'inr',
                    'unit_amount' => 20000,
                    'product_data' => [
                        'name' => 'test',
                        'images' => ['https://i.imgur.com/EHyR2nP.png']
                    ],
                ],
                'quantity' => 1,
            ],
            [
                'price_data' => [
                    'currency' => 'inr',
                    'unit_amount' => 1000,
                    'product_data' => [
                        'name' => 'test1',
                        'images' => ['https://i.imgur.com/EHyR2nP.png']
                    ],
                ],
                'quantity' => 1,
            ],
        ];
        $data['metaData'] = "meta data";
        $data['successUrl'] = $config->baseURL . 'success';
        $data['cancelUrl'] = $config->baseURL . 'cancel';
        $url = $this->stripeCheckout($data);


        return redirect()->to($url);
        if (session()->get('id')) {
        } else {
            return redirect()->to('/login');
        }
    }

    public function success()
    {
        $sessionId = $_GET['session_id'];
        
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        echo '<pre>'; print_r($session); exit;
    }

    public function cancel()
    {
        echo 'canceled'; exit;
    }

    public function stripeCheckout($data)
    {
        header('Content-Type: application/json');

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $data['lineItems'],
            'mode' => 'payment',
            'metadata' => $data['metaData'],
            'success_url' => $data['successUrl'] . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $data['cancelUrl'],
        ]);
        header("HTTP/1.1 303 See Other");
        return $checkout_session->url;
    }
}
