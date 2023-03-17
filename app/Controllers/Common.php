<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\Country;
use App\Models\OrderModel;
use App\Models\PaidBankAccountModel;
use App\Models\NotificationModel;



class Common extends BaseController

{
    public function __construct()
    {
        if (session()->get('customer_type') != "2" && session()->get('customer_type') != "1" ) {
            echo 'Access denied';
            exit;
        }
    }

    public function payments()

    {
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $orderModel = new PaidBankAccountModel();
      
      
        $data['title'] = 'Payments';
        $user_id = session()->get('id');  
		$data['accounts']=$orderModel->getAccounts($user_id);
		$data['billings']=$orderModel->getBillingAccounts($user_id);
		$data['tab']="payment";
       
        return view('frontend/Common/payments', $data);

    }

	public function addnewbank(){
	
		if($this->request->getMethod()=="post"){
			{				
				$pAccountModel = new PaidBankAccountModel();
				
				$user_id = session()->get('id');
				$type=$this->request->getVar('type');
				$data=[];
				$data['user_id']=$user_id;
				$data['accountH']=$this->request->getVar('accounth');
				$data['bankN']=$this->request->getVar('bankn');
				$data['accountN']=$this->request->getVar('accountn');
				$data['ifsc']=$this->request->getVar('ifsc');
				$data['accountT']=$this->request->getVar('accountt');
				$data['city']=$this->request->getVar('city');
				$data['zipcode']=$this->request->getVar('zipcode');
				
				
				if($type=="add"){
					$data['createdAt']=time();
					if($pAccountModel->saveAccount($data)){				
						session()->setFlashdata('success','Bank Details added successfully');
					}else{
						session()->setFlashdata('error','Something went wrong');					
					}
				}elseif($type=="edit"){
					$data['updatedAt']=time();
					$id=base64_decode($this->request->getVar('id'));
					if($pAccountModel->updateAccount($data,$id)){				
						session()->setFlashdata('success','Bank Details updated successfully');
					}else{
						session()->setFlashdata('error','Something went wrong');					
					}
				}
			}
			return  redirect('payments','refresh');
		}else{
			$data['title'] = 'Payments';
			$data['tab']="payment";
			$data['type']='add';
			return view('frontend/Common/get-paid-payments', $data);
		}
	}
	
	public function editpaidbank(){
		$id=$this->request->getVar('id');
		$id=base64_decode($id);
		
		$pAccountModel = new PaidBankAccountModel();
		$data['accounts']=$pAccountModel->getAccountDetails($id);
		
		if(empty($data['accounts'])){
			session()->setFlashdata('error','Something went wrong');
			return  redirect('payments','refresh');
		}
		$data['title'] = 'Payments';
		$data['tab']="payment";
		$data['type']='edit';
		return view('frontend/Common/get-paid-payments', $data);
	}
	


	public function addbilling(){
	
		if($this->request->getMethod()=="post"){
			{				
				$pAccountModel = new PaidBankAccountModel();
				
				$user_id = session()->get('id');
				$type=$this->request->getVar('type');
				$data=[];
				$data['user_id']=$user_id;
				$data['holderN']=$this->request->getVar('holderN');
				$data['cardN']=$this->request->getVar('cardN');				
				$data['expire']=$this->request->getVar('expire');
				$data['code']=$this->request->getVar('code');
				
				$data['createdAt']=time();
				
				if($type=="add"){
					if($pAccountModel->saveBillingAccount($data)){				
						session()->setFlashdata('success','Card Details added successfully');
					}else{
						session()->setFlashdata('error','Something went wrong');					
					}
				}elseif($type=="edit"){
					$id=base64_decode($this->request->getVar('id'));
					if($pAccountModel->updateBillingAccount($data,$id)){				
						session()->setFlashdata('success','Card Details updated successfully');
					}else{
						session()->setFlashdata('error','Something went wrong');					
					}
				}
			}
			return  redirect('payments','refresh');
		}else{
			$data['title'] = 'Billing';
			$data['tab']="billing";
			$data['type']='add';
			return view('frontend/Common/billings', $data);
		}
	}
	
	public function editbilling(){
		$id=$this->request->getVar('id');
		$id=base64_decode($id);
		
		$pAccountModel = new PaidBankAccountModel();
		$data['billings']=$pAccountModel->getBillingAccountDetails($id);
		
		
		if(empty($data['billings'])){
			session()->setFlashdata('error','Something went wrong');
			return  redirect('payments','refresh');
		}
		$data['title'] = 'Billing';
		$data['tab']="billing";
		$data['type']='edit';
		return view('frontend/Common/billings', $data);
	}

	public function notification(){
		//print_r($_POST);
		//die();
		$user_id = session()->get('id');
        $userModel = new UsersModel();
        $NotificationModel = new NotificationModel();
		$notification=$NotificationModel->getdetails($user_id);
		$id=$this->request->getVar('id');
		$data['activity']=$this->request->getVar('activity');
		$data['cron']=$this->request->getVar('cron');
		$data['offline']=($this->request->getVar('offline')=="checked") ? 1 :0;
		$data['user_id']=$user_id;
		
      if($this->request->getMethod()=="post"){
			//print_r($data);
			//print_r($_POST);die();
				if(!empty($notification)){
					$data['updatedAt']=time();
					$NotificationModel->updateAccount($data,$id);
					session()->setFlashdata('success','Details updated successfully');
				}else{
					$data['createdAt']=time();
					$NotificationModel->saveAccount($data);
					session()->setFlashdata('success','Details added successfully');
				}
				
			}
		$data['notifications']=$notification;
        $data['title'] = 'Notification';
        $user_id = session()->get('id');  
		
		
        return view('frontend/Common/notification', $data);
	}
	
	public function allnotifications(){
		$data['title'] = 'Notifications';
		
		if(session()->get('id')){
			$user_id = session()->get('id');
			$NotificationModel = new NotificationModel();
			$notifications=$NotificationModel->homenotifications($user_id);
			$data['notifications']=$notifications;
		}else{
			$data['notifications']=[];
		}
		
		return view('frontend/home-notifications', $data);
	}
	
	public function deletenotifications(){
		$id=$this->request->getvar('msg');
		$id=base64_decode($id);
		$NotificationModel = new NotificationModel();
		$notifications=$NotificationModel->deletehomenotifications($id);
		return redirect("allnotifications","refresh");
	}
}
