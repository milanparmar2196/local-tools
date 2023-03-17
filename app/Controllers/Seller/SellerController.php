<?php



namespace App\Controllers\Seller        ;



use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\Country;
use App\Models\OrderModel;
use App\Models\PostAdsModel;



class SellerController extends BaseController

{
    public function __construct()
    {
        if (session()->get('customer_type') != "1") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()

    {
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $countryModel = new Country();
        $data['parent_category'] = $userModel->where('id', $user_id)->findAll();
        $data['country_data'] = $countryModel->findAll();
        return view('frontend/Seller/dashboard', $data);

    }

    public function manage_profile(){
        $data['title'] = 'Profile Information';
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $countryModel = new Country();
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        $data['country_data'] = $countryModel->findAll();
        return view('frontend/Seller/profile', $data);
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
        return redirect()->to('seller/manage-profile')->with('status', 'Profile updated successfully');
        
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
        return view('frontend/Seller/change_password', $data);
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

                    return redirect()->to('seller/change-password')->with('status', 'Password Updated Successfully');
                    
                }else{
                    return redirect()->to('seller/change-password')->with('error', 'Old Password does not match');
                    
                }
                

            }else{
                $data['validation'] = $this->validator;
            }
        
    }


    public function document(){
        $data['title']  = 'Document';
        return view('frontend/Seller/document', $data);
    }


    public function seller_account(){
        $data['title']  = 'Seller Account';
		$model=new PostAdsModel();
		$data['plans']=$model->getplans();
		
        return view('frontend/Seller/seller-account', $data);
    }
	
	public function products(){
		$user_id = session()->get('id');
		$searchText=$this->request->getVar('searchtxt');
		
		$model=new PostAdsModel();
		$products=$model->getproducts($user_id,$searchText);
		$data['products']=$products;
		
		return view('frontend/Seller/product-details', $data);
		
	}
	
	public function membership(){
		$user_id = session()->get('id');
		$searchText=$this->request->getVar('searchtxt');
		
		$model=new PostAdsModel();
		$products=$model->getmembership($user_id,$searchText);
		$data['products']=$products;
		
		//print_r($products);die();
		
		return view('frontend/Seller/membership', $data);
	}

	public function deleteproduct(){
		$id=$this->request->getVar('id');
		$model=new PostAdsModel();
		$model->deleteproduct($id);
		
		return redirect('seller/seller-account');
	}


	public function changestatus(){
		$id=$this->request->getVar('id');
		$status=$this->request->getVar('status');
		$model=new PostAdsModel();
        $data=$model->changestatus($id,$status);
		return true;
		
	}

	public function orders(){
        
        $user_id = session()->get('id');
        $searchText=$this->request->getVar('searchtxt');

        $orderModel = new OrderModel();
        $orders=$orderModel->get_ordersbyseller_id($user_id,$searchText);
        $data['orders']=$orders;
	//print_r($orders);die();
        return view('frontend/Seller/order-table', $data);
    }

    public function orders_modals(){
        $user_id = session()->get('id');
        $orderid=$this->request->getVar('orderid');
        $orderid=base64_decode($orderid);
        $orderModel = new OrderModel();       
        $orders=$orderModel->get_orderdetails($orderid);
        $data['v']=$orders;
        $userModel=new UsersModel();
        $data['user']=$userModel->getuserdetails($user_id);
               
        return view('frontend/Seller/order-modal', $data);
    }

    public function invoices(){
        $user_id = session()->get('id');
        $fdate=$this->request->getVar('fdate');
        $tdate=$this->request->getVar('tdate');
		$type=$this->request->getVar('type');
       
        $orderModel = new OrderModel();
        $invoices=$orderModel->get_allsellerorders($user_id,$fdate,$tdate,$type);
        $data['invoices']=$invoices;
        $data['pay_amt']=$orderModel->get_allsellerordersamt($user_id,$fdate,$tdate,$type);
      // print_r($data);die();
       
        return view('frontend/Seller/invoice-table', $data);
    }

    public function invoicedetails_modals(){
        $user_id = session()->get('id');
        $orderid=$this->request->getVar('orderid');
        $orderid=base64_decode($orderid);
        $orderModel = new OrderModel();       
        $orders=$orderModel->get_orderdetails($orderid);
        $data['v']=$orders;
        $userModel=new UsersModel();
        $data['user']=$userModel->getuserdetails($user_id);
        $data['print']=0; //this is added as on modal invoice get hidden      
        return view('frontend/Seller/invoice-print', $data);
    }
}

