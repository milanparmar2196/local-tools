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
            return redirect()->to('/');   
        }else{
            $data['validation'] = $this->validator;
            $CountryModel = new Country();
            $data['country'] = $CountryModel->findAll();
           
            echo view('frontend/register', $data);
        }
          
    }
    // Login page function
    public function login(){
        if(session()->get('id'))
        {
            return redirect()->to('/'); 
            
        }
        else{
            return view('frontend/signin');
        }
        
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
                    'customer_type' => $data['customer_type'],
                    'image' => $data['image'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                if($_SESSION['customer_type'] == 1){
                    return redirect()->to('/');    
                }
               else if($_SESSION['customer_type'] == 2){
                    return redirect()->to('/');    
                }
                else{
                    if (session()->get('customer_type') != "2") {
                        return redirect()->to('/login');
                    }else{
                        return redirect()->to('/');
                    }
                }
                
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }

    public function Logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function ForgotPassword(){
        $data = [];
        return view('frontend/forget-password', $data);
    }
    public function password_reset(){
        helper('string');
        $rules = [
            'email' => 'required|min_length[4]|valid_email'
        ];
        if($this->validate($rules)){
            $token = mt_rand(100000, 999999);
            $userModel = new UsersModel();
            $userdata = $userModel->where('email', $this->request->getVar('email'))->first();
            $data = [ 'email' => $this->request->getVar('email'),
                      'remember_token' => $token,
        ];
         
        $userModel->update($userdata['id'], $data);
            $to = $data['email'];
            $subject = 'Reset Password Link';
            $token_no = $token;
            $message = 'Hi '.$userdata['first_name']. '<br><br>'
                        . 'Your reset password request has been received. Please click'
                        . 'the blow link to reset the password. <br><br>'
                        . '<a href="'.base_url().'/reset_password/'.$token_no.'"> Click here to Password</a><br><br>'
                        . 'Thanks <br> Local Tools';
                        $email = \config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('info@kiwiox.com'. 'LocalTools');
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        if($email->send()){
                            session()->setTempdata('Success', 'Reset Password link send to your registered email. Please verify with in 15mints',3);
                        }
                        else{
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                        return $this->response->redirect(site_url('/reset_password'));
        }
    }

    public function reset_password(){
        $data = [];
        return view('frontend/reset_password');
    }


    public function change_password(){
        $rules =  [
            'email' => 'required|valid_email',
            'token' => 'required|min_length[6]',
            'password' => 'required|min_length[4]',
            'confirmpassword' => 'matches[password]'
        ];
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $email = $this->request->getVar('email');
            $token = $this->request->getVar('token');
            $password = $this->request->getVar('password');

            $userdata = $userModel->where('remember_token', $token)->where('email', $email)->first();
            if(!empty($userdata)){
                $data = [
                    'email' =>$this->request->getVar('email'),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'token' => 'NULL',
                ];
                $userModel->update($userdata['id'], $data);
                return $this->response->redirect(site_url('/login'));
            }else{
                echo "NO DATA Found";
            }
            return $this->response->redirect(site_url('/login'));
        }
    }
}
