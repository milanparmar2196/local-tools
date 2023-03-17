<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandsModel;

class BrandsController extends BaseController
{
    public function __construct()
    {
        if (session()->get('customer_type') != "0") {
            echo 'Access denied';
            exit;
        }
    }
    // Load category page
    public function index()
    {
        $brandsModel = new BrandsModel();

        $data['brands'] = $brandsModel->orderBy('id', 'DESC')->paginate();

        $data['pagination_link'] = $brandsModel->pager;

        
        return view("admin/pages/brands", $data);
    }

    public function brand(){
        $data = [];
         
        return view("admin/pages/create_brands", $data);
    }

    public function create_brands(){
        
        helper(['form']);
        $rules = [
            'name'          => 'required', 
            'status'          => 'required',
        ];
        if($this->validate($rules)){

            $brandsModel = new BrandsModel();

            $data = [
               
                  'name' => $this->request->getVar('name'),
                  'status' => $this->request->getVar('status'),

            ];
            $brandsModel->save($data);
            return redirect()->to('admin/brands/create')->with('status', 'Brand Created Sucessfully.');  
        }
    }

    public function update_status(){
        $model = new BrandsModel();

        $id = $this->request->getPost('id');
        
        $data = array(
            'status'  => $this->request->getPost('status'),
        );
        $model->updateStatus($data, $id);
        return redirect()->to('/admin/brands');
    }

    public function delete_brand(){
        $model =  new BrandsModel();

        $id = $this->request->getPost('id');
        
        $model->deleteBrand($id);

        return redirect()->to('/admin/brands');
    }

    public function edit($param = "$1"){

        $brandsModel = new BrandsModel();

        $id = $param;

        $data['brand_data'] = $brandsModel->where('id', $id)->first();

        
        return view('admin/pages/edit_brand', $data);
    }


    public function update_brands(){
        helper(['form']);
        $model = new BrandsModel();
        $id = $this->request->getPost('id');
        $data = [
            'name' =>$this->request->getVar('name'),
            'status' =>$this->request->getVar('status'),
        ];
        $model->update_brand($data,$id);
        return redirect()->to('admin/brands')->with('status', 'Category Updated.');
    }

}