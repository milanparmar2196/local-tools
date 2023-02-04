<?php

namespace App\Controllers;
use App\Models\Country;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function index()
    {
        return view('include/login_header')
        . view('frontend/signin')
        . view('include/login_footer');
    }
    public function register()
    {
        $CountryModel = new Country();
        $data['country'] = $CountryModel->findAll();

        return view('include/login_header')
        . view('frontend/register', $data)
        . view('include/login_footer');
    }

    public function insert()
    {
        
        helper(['form']);
        $rules = [
            'first_name'          => 'required|min_length[2]|max_length[50]',
            'last_name'          => 'required|min_length[2]|max_length[50]',
            'phone'          => 'required|min_length[10]|max_length[13]',
            'country'          => 'required',
            'country_pre'          => 'required',
            // 'type'          => 'required',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $data = [
               
                  'first_name' =>$this->request->getVar('first_name'),
                  'last_name' =>$this->request->getVar('last_name'),
                  'country_pre' =>$this->request->getVar('country_pre'),
                  'phone' =>$this->request->getVar('phone'),
                  'country' =>$this->request->getVar('country'),
                  'email' =>$this->request->getVar('email'),
                //   'type' =>$this->request->getVar('user_type'),
                  'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            // var_dump($data);
            $userModel->save($data);
            //return redirect()->to('/frontend/signin');
            echo  view('include/login_header');
            echo view('frontend/signin');
            echo view('include/login_footer');
        }else{
            $data['validation'] = $this->validator;
            $CountryModel = new Country();
            $data['country'] = $CountryModel->findAll();
           
            echo  view('include/login_header');
            echo view('frontend/register', $data);
            echo view('include/login_footer');
        }
          
    }
    
    public function loginAuth()
    {
        $session = session();
        $userModel = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    // 'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('frontend/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

}
