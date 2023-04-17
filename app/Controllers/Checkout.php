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
        $data['metaData'] = [];
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
        echo '<pre>';
        print_r($session);
        exit;
    }

    public function cancel()
    {
        echo 'canceled';
        exit;
    }

    public function createCustomer()
    {
        $data = [
            "name" => "Rushikesh",
            "email" => "rushikesh@yopmail.com",
            "address" => "Address",
            "phone" => "Phone",
            "description" => "Optional",
            "metadata" => []
        ];
        $response = $this->stripeCreateCustomer($data);
    }

    public function createBank()
    {
        $data = [
            "customerId" => 'cus_NizHcBkjjZJNwZ',
            "country" => "US",
            "currency" => "usd",
            "account_holder_name" => "Jenny Rosen",
            "account_holder_type" => "individual",
            "routing_number" => "110000000",
            "account_number" => "000123456789",
        ];
        $response = $this->stripeCreateBank($data);
    }

    public function payout()
    {
        $data = [
            "amount" => '1000',
            "currency" => "usd",
            "bankId" => "ba_1MxXJFCRR52ADH4wn5Dz4yBB",
            "description" => "Description optional",
            "metadata" => []
        ];
        $response = $this->stripePayout($data);
    }


    // Stripe Functions
    public function stripeCheckout($data)
    {
        try {
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function stripeCreateCustomer($data)
    {
        try {
            $customer = \Stripe\Customer::create([
                'email' => (isset($data['email'])) ? $data['email'] : '',
                'address' => (isset($data['address'])) ? $data['address'] : '',
                'description' => (isset($data['description'])) ? $data['description'] : '',
                'name' => (isset($data['name'])) ? $data['name'] : '',
                'phone' => (isset($data['phone'])) ? $data['phone'] : '',
                'metadata' => (isset($data['metadata'])) ? $data['metadata'] : ''
            ]);
            return $customer;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function stripeCreateBank($data)
    {
        try {
            $token = \Stripe\Token::create([
                'bank_account' => [
                    'country' => (isset($data['country'])) ? $data['country'] : '',
                    'currency' => (isset($data['currency'])) ? $data['currency'] : '',
                    'account_holder_name' => (isset($data['account_holder_name'])) ? $data['account_holder_name'] : '',
                    'account_holder_type' => (isset($data['account_holder_type'])) ? $data['account_holder_type'] : '',
                    'routing_number' => (isset($data['routing_number'])) ? $data['routing_number'] : '',
                    'account_number' => (isset($data['account_number'])) ? $data['account_number'] : ''
                ]
            ]);

            $bank = \Stripe\Customer::createSource($data['customerId'], [
                'source' => $token->id,
                'metadata' => (isset($data['metadata'])) ? $data['metadata'] : []
            ]);

            return $bank;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function stripePayout($data)
    {
        try {
            $payout = \Stripe\Payout::create([
                'amount' => $data['amount'],
                'currency' => $data['currency'],
                'destination' => $data['bankId'],
                'description' => (isset($data['description'])) ? $data['description'] : '',
                'metadata' => (isset($data['metadata'])) ? $data['metadata'] : '',
            ]);
            return $payout;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
