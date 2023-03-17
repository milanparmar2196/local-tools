<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class UserController extends BaseController
{
    public function admin_login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('admin/pages/index', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new AdminModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if($user['customer_type'] == "0"){

                    return redirect()->to(base_url('admin'));

                }elseif($user['customer_type'] == "1"){

                    return redirect()->to(base_url('editor'));
                }
            }
        }
        return view('admin/pages/index');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' =>$user['last_name'],
            'phone' => $user['phone'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "customer_type" => $user['customer_type'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin_login');
    }
}