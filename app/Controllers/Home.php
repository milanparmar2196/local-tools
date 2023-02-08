<?php

namespace App\Controllers;
use App\Models\Country;
use App\Models\UsersModel;

class Home extends BaseController
{
    // homepage 
    public function index()
    {
        return  view('frontend/Page/index');
    }
    // Register Page
    public function register()
    {
        $CountryModel = new Country();
        $data['country'] = $CountryModel->findAll();
        
        return  view('frontend/register', $data);
    }
    // user register 
    public function insert()
    {
        
        helper(['form']);
        
        $rules = [
            'first_name'          => 'required|min_length[2]|max_length[50]',
            'last_name'          => 'required|min_length[2]|max_length[50]',
            'phone'          => 'required|min_length[10]|max_length[13]',
            'country'          => 'required',
            'country_pre'          => 'required',
            'customer_type'          => 'required',
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
                  'customer_type' =>$this->request->getVar('customer_type'),
                  'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            // var_dump($this->request->getPost());
            // exit();
            $userModel->save($data);
            return redirect()->to('/profile');   
        }else{
            $data['validation'] = $this->validator;
            $CountryModel = new Country();
            $data['country'] = $CountryModel->findAll();
           
            echo view('frontend/register', $data);
        }
          
    }
    // Login page function
    public function login(){
        return view('frontend/Page/profile');
    }
    // Confirm Login function
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
                    'first_name' => $data['first_name'],
                    'last_name' =>$data['last_name'],
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
