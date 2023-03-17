<?php



namespace App\Controllers\Buyer        ;



use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\Country;
use App\Models\OrderModel;



class BuyerController extends BaseController

{
    public function __construct()
    {
        if (session()->get('customer_type') != "2") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()

    {
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $countryModel = new Country();
      
      
        $data['title'] = 'Profile Information';
        $user_id = session()->get('id');      
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        $data['country_data'] = $countryModel->findAll();
        return view('frontend/Buyer/profile', $data);

    }

    public function manage_profile(){
        $data['title'] = 'Profile Information';
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $countryModel = new Country();
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        $data['country_data'] = $countryModel->findAll();
        return view('frontend/Buyer/profile', $data);
    }

    public function update_profile(){
        helper(['form']);
        $model = new UsersModel();
        $id = $this->request->getPost('id');
        
        $data = [
            'first_name' =>$this->request->getVar('first_name'),
            'last_name' =>$this->request->getVar('last_name'),
            'phone' =>$this->request->getVar('phone'),
            'city' =>$this->request->getVar('city'),
            'zipcode' =>$this->request->getVar('zipcode'),
            'state' =>$this->request->getVar('state'),
            'country' =>$this->request->getVar('country'),
        ];
        
        $model->update_profile($data,$id);
        return redirect()->to('buyer/manage-profile')->with('status', 'Profile updated successfully');
        
    }
    public function change_password(){
        $userModel = new UsersModel();
        $data['title'] = 'Change Password';
        $user_id = session()->get('id');
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        if($this->request->getMethod() == 'POST'){
            $rules = [
                'old_password' => 'required',
                'password' => 'required|min_length[6]|max_length[30]',
                'confirmpassword' => 'required|min_length[6]|max_length[30]'
            ];
            
            if($this->validate($rules)){
                $oldpassword = $this->request->getVar('old_password');
                $newpassword = $this->request->getVar('password');
                $cnewpassword = $this->request->getVar('confirmpassword');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('frontend/Buyer/change_password', $data);
    }

    public function update_password(){
        $userModel = new UsersModel();
        $user_id = session()->get('id');
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        
            $rules = [
                'old_password' => 'required',
                'password' => 'required|min_length[6]|max_length[30]',
                'confirmpassword' => 'matches[password]'
            ];
            
            if($this->validate($rules)){
                $oldpassword = $this->request->getVar('old_password');
                $newpassword = $this->request->getVar('password');
                
                foreach($data['user_data'] as $user_data){
                    $old_pass= $user_data['password'];
                }
                
                if(password_verify($oldpassword, $old_pass))
                {
                    $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

                    $data = array(
                        'password'  => $newpassword,
                    );

                    $userModel->update_profile($data, $user_id);

                    return redirect()->to('buyer/change-password')->with('status', 'Password Updated Successfully');
                    
                }else{
                    return redirect()->to('buyer/change-password')->with('error', 'Old Password does not match');
                    
                }
                

            }else{
                $data['validation'] = $this->validator;
            }
        
    }


    public function document(){
        $data['title']  = 'Document';
        return view('frontend/Buyer/document', $data);
    }


    public function buyer_account(){
        $data['title']  = 'Buyer Account';
        $user_id = session()->get('id');
        
         $orderModel = new OrderModel();
         $invoices=$orderModel->get_allorders($user_id,"","");
         $data['invoices']=$invoices;     
        
         $data['pay_amt']=$orderModel->get_allordersamt($user_id,"","");

         $currentDate=Date('Y-m-d');
         $lastsevendaysDate=date('Y-m-d', strtotime('-7 days'));

         $data['lastsevendaysData']=$orderModel->get_allorders($user_id,$lastsevendaysDate,$currentDate);

        return view('frontend/Buyer/buyer-account', $data);
    }

    public function buyer_orders(){
        
        $user_id = session()->get('id');
        $searchText=$this->request->getVar('searchtxt');

        $orderModel = new OrderModel();
        $orders=$orderModel->get_ordersbyuser_id($user_id,$searchText);
        $data['orders']=$orders;

        return view('frontend/Buyer/order-table', $data);
    }

    public function payments(){

    }

    public function notifications(){
        return view('frontend/Buyer/notifications', $data);
    }

    public function orders_modal(){
        $user_id = session()->get('id');
        $orderid=$this->request->getVar('orderid');
        $orderid=base64_decode($orderid);
        $orderModel = new OrderModel();       
        $orders=$orderModel->get_orderdetails($orderid);
        $data['v']=$orders;
        $userModel=new UsersModel();
        $data['user']=$userModel->getuserdetails($user_id);
               
        return view('frontend/Buyer/order-modal', $data);
    }

    public function buyer_invoices(){
        $user_id = session()->get('id');
        $fdate=$this->request->getVar('fdate');
        $tdate=$this->request->getVar('tdate');

       
        $orderModel = new OrderModel();
        $invoices=$orderModel->get_allorders($user_id,$fdate,$tdate);
        $data['invoices']=$invoices;
        $data['pay_amt']=$orderModel->get_allordersamt($user_id,$fdate,$tdate);
      // print_r($data);die();
       
        return view('frontend/Buyer/invoice-table', $data);
    }

    public function invoicedetails_modal(){
        $user_id = session()->get('id');
        $orderid=$this->request->getVar('orderid');
        $orderid=base64_decode($orderid);
        $orderModel = new OrderModel();       
        $orders=$orderModel->get_orderdetails($orderid);
        $data['v']=$orders;
        $userModel=new UsersModel();
        $data['user']=$userModel->getuserdetails($user_id);
        $data['print']=0; //this is added as on modal invoice get hidden      
        return view('frontend/Buyer/invoice-print', $data);
    }
}

