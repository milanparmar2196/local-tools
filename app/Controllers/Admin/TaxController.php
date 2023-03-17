<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TaxModel;

class TaxController extends BaseController
{   
    public function __construct()
    {
        if (session()->get('customer_type') != "0") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $taxModel = new TaxModel();
        $data['tax'] = $taxModel->orderBy('id', 'DESC')->paginate();

        $data['pagination_link'] = $taxModel->pager;
        return view('admin/pages/tax', $data);
    }
    public function create_tax(){
        $data = [];
         
        return view("admin/pages/tax-create", $data);
    }
    public function create(){
        helper(['form']);
        $rules = [
            'name'          => 'required', 
            'percentage'          => 'required',
            'status'          => 'required',
        ];
        if($this->validate($rules)){

            $TaxModel = new TaxModel();

            $data = [
               
                  'name' => $this->request->getVar('name'),
                  'percentage' => $this->request->getVar('percentage'),
                  'status' => $this->request->getVar('status'),

            ];
            $TaxModel->save($data);
            return redirect()->to('admin/tax/create-tax')->with('status', 'Tax Added Sucessfully.');  
        }
    }

    public function update_status(){
        $model = new TaxModel();

        $id = $this->request->getPost('id');
        
        $data = array(
            'status'  => $this->request->getPost('status'),
        );
        $model->updateStatus($data, $id);
        return redirect()->to('/admin/tax');
    }

    public function delete_tax(){
        $model =  new TaxModel();

        $id = $this->request->getPost('id');
        
        $model->deletetax($id);

        return redirect()->to('/admin/tax');
    }
    
    public function edit($param = "$1"){

        $TaxModel = new TaxModel();

        $id = $param;

        $data['tax_data'] = $TaxModel->where('id', $id)->first();

        
        return view('admin/pages/edit_tax', $data);
    }


    public function update_tax(){
        helper(['form']);
        $model = new TaxModel();
        $id = $this->request->getPost('id');
        $data = [
            'name' =>$this->request->getVar('name'),
            'percentage' =>$this->request->getVar('percentage'),
            'status' =>$this->request->getVar('status'),
        ];
        $model->update_brand($data,$id);
        return redirect()->to('admin/tax')->with('status', 'Tax Updated.');
    }
}
