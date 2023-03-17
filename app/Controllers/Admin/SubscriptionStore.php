<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SubscriptionPlansModel;
use App\Models\SubscriptionModel;

class SubscriptionStore extends BaseController
{
    
    public function index()
    {
        $plansModel = new SubscriptionModel();
          $data['SubscriptionPlans']  = $plansModel->getplans();
             //echo '<pre>';print_r($data['SubscriptionPlans']);exit;
        return view("admin/pages/Subscription_Plans", $data);
    }
    public function create_subscription_plan(){

        $data['title'] = 'Create Subscription Plan';
        $plansModel = new SubscriptionModel();
        $where = array(
            'status' => 1
        );
        $data['plans']  = $plansModel->where($where)->findAll();
        
        return view("admin/pages/create_subscription_plan", $data);
    }
    public function create(){
        helper(['form']);
        $rules = [
            'name'          => 'required', 
            'duration'          => 'required',
            'status'          => 'required',
            'amount' => 'required',
        ];
        if($this->validate($rules)){

            $SubscriptionPlansModel = new SubscriptionPlansModel();
            $file = $this->request->getFile('icon');
            if($file->isValid() && ! $file->hasMoved())
            {
                $imagename = $file->getRandomName();
                $file->move('./public/uploads/', $imagename);
            }

            $data = [
               
                  'plan_id' => $this->request->getVar('name'),
                  'duration' => $this->request->getVar('duration'),
                  'status' => $this->request->getVar('status'),
                  'amount' => $this->request->getVar('amount'),
                  'icon' => $imagename,

            ];
            $SubscriptionPlansModel->save($data);
            $plansModel = new SubscriptionModel();
            $where = array(
                'status' => 1
            );
            $data['plans']  = $plansModel->where($where)->findAll();
            return redirect()->to('admin/subscription/create', $data)->with('status', 'Brand Created Sucessfully.');  
        }else{
            
           $data = [];


            
            
            return view("admin/pages/create_subscription_plan", $data);
        }
    }
    public function update_status(){
        $model = new SubscriptionPlansModel();

        $id = $this->request->getPost('id');
        
        $data = array(
            'status'  => $this->request->getPost('status'),
        );
        $model->updateStatus($data, $id);
        return redirect()->to('/admin/subscription');
    }


    public function delete_plan(){
        $model =  new SubscriptionPlansModel();

        $id = $this->request->getPost('id');
        
        $model->deleteplan($id);

        return redirect()->to('/admin/subscription');
    }

    public function edit($param = "$1"){

        $SubscriptionPlansModel = new SubscriptionPlansModel();

        $id = $param;

        $plansModel = new SubscriptionModel();
            $where = array(
                'status' => 1
            );
            $data['plans']  = $plansModel->where($where)->findAll();

        $data['Plans_data'] = $SubscriptionPlansModel->where('id', $id)->first();

        
        return view('admin/pages/edit_subscription_plansModel', $data);
    }

    public function update_plan(){
        helper(['form']);
        $model = new SubscriptionPlansModel();
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('icon');
    
        if($_FILES['icon']['size'] == 0){

            $data = [
                'plan_id' =>$this->request->getVar('name'),
                'status' =>$this->request->getVar('status'),
                'duration' =>$this->request->getVar('duration'),
                'amount' =>$this->request->getVar('amount'),
          ];
          
          $model->update_plan($data,$id);

          return redirect()->to('admin/subscription')->with('status', 'Subscription Plan Updated.'); 

        }else{

            $file = $this->request->getFile('icon');

            if($file->isValid() && ! $file->hasMoved())
            {
                $imagename = $file->getRandomName();
                $file->move('./public/uploads/', $imagename);
            }
            
            $data = [
                'plan_id' =>$this->request->getVar('name'),
                'status' =>$this->request->getVar('status'),
                'duration' =>$this->request->getVar('duration'),
                'amount' =>$this->request->getVar('amount'),
                'icon' =>$imagename,
            ];
            $model->update_plan($data,$id);
            return redirect()->to('admin/subscription')->with('status', 'Subscription Plan Updated.');
        }

    }
}
