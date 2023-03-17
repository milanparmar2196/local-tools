<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
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
        $categoryModel = new CategoryModel();

        $data['category_data'] = $categoryModel->where('parent_id', 0)->orderBy('id', 'DESC')->paginate();

        $data['pagination_link'] = $categoryModel->pager;

        $data['category_count'] = $categoryModel->where('parent_id', 0)->countAllResults();
        
        return view("admin/pages/category", $data);
    }

    // Create New Primary Category

    public function create_category()
    {   
        helper(['form']);
        $rules = [
            'name'          => 'required', 
            'is_active'          => 'required',
        ];
        if($this->validate($rules)){
            $categoryModel = new CategoryModel();
            $file = $this->request->getFile('icon');
            if($file->isValid() && ! $file->hasMoved())
            {
                $imagename = $file->getRandomName();
                $file->move('./public/uploads/', $imagename);
            }

            $data = [
               
                  'name' =>$this->request->getVar('name'),
                  'icon' =>$imagename,
                  'is_active' =>$this->request->getVar('is_active'),
            ];
            $categoryModel->save($data);
            return redirect()->to('admin/category/create')->with('status', 'Category Added with icons.');  
        }else{
            
            $categoryModel = new CategoryModel();

            $data['parent_category'] = $categoryModel->where('parent_id', 0)->orderBy('id', 'DESC')->paginate();

            
            
            return view("admin/pages/create_category", $data);
        }
        
    }


    public function create_subcategory()
    {   
        helper(['form']);
        $rules = [
            'name'          => 'required', 
            'is_active'     => 'required',
            'parent_id'     => 'required',
        ];
        if($this->validate($rules)){
            $categoryModel = new CategoryModel();
            $data = [
               
                  'name' =>$this->request->getVar('name'),
                  'parent_id' =>$this->request->getVar('parent_id'),
                  'is_active' =>$this->request->getVar('is_active'),
            ];
            $categoryModel->save($data);

            return redirect()->to('admin/category/create')->with('status', 'Sub-Category Added Successfully.');  
        }
        else{
            return redirect()->to('admin/category/create', $validation);
        }
        
    }
    
    public function update_status()
    {
        $model = new CategoryModel();
        $id = $this->request->getPost('id');
        // echo var_dump($this->request->getPost('id'));
        
        $data = array(
            'is_active'  => $this->request->getPost('is_active'),
        );
        $model->updateStatus($data, $id);
        return redirect()->to('/admin/category');
    }

    public function delete_category(){

        $model =  new CategoryModel();

        $id = $this->request->getPost('id');
        
        $model->deleteCategory($id);

        return redirect()->to('/admin/category');

    }

    public function edit_category($param = "$1"){

        $categoryModel = new CategoryModel();

        $data['parent_category'] = $categoryModel->orderBy('id', 'DESC')->paginate();

        $id = $param;

        $data['category_data'] = $categoryModel->where('id', $id)->first();

        return view('admin/pages/edit_category', $data);
    }

    public function edit_subcategory($param = "$1"){

        $categoryModel = new CategoryModel();

        $id = $param;

        $data['parent_category'] = $categoryModel->where('parent_id',0)->orderBy('id', 'DESC')->paginate();

        $data['category_data'] = $categoryModel->where('id', $id)->first();

        return view('admin/pages/edit_sub_category', $data);
    }

    // update Parent Category

    public function update(){
        helper(['form']);
        $model = new CategoryModel();
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('icon');
    
        if($_FILES['icon']['size'] == 0){

            $data = [
                'name' =>$this->request->getVar('name'),
                'is_active' =>$this->request->getVar('is_active'),
          ];
          
          $model->update_category($data,$id);

          return redirect()->to('admin/category')->with('status', 'Category Updated.'); 

        }else{

            $file = $this->request->getFile('icon');

            if($file->isValid() && ! $file->hasMoved())
            {
                $imagename = $file->getRandomName();
                $file->move('./public/uploads/', $imagename);
            }
            
            $data = [
                'name' =>$this->request->getVar('name'),
                'icon' =>$imagename,
                'is_active' =>$this->request->getVar('is_active'),
            ];
            $model->update_category($data,$id);
            return redirect()->to('admin/category')->with('status', 'Category Updated.');
        }

    }

    public function update_sub_category(){
        helper(['form']);
        $model = new CategoryModel();
        $id = $this->request->getPost('id');
        $data = [
                'name' =>$this->request->getVar('name'),
                'is_active' =>$this->request->getVar('is_active'),
                'parent_id' =>$this->request->getVar('parent_id'),
          ];
          
          $model->update_category($data,$id);

          return redirect()->to('admin/category')->with('status', 'Category Updated.'); 

        }

    



    public function view_subcategory($param = "$1"){

        $categoryModel = new CategoryModel();

        /*$data['parent_category'] = $categoryModel->orderBy('id', 'DESC')->paginate(25);

        $id = $param;

        $data['category_data'] = $categoryModel->where('parent_id', $id)->first();*/
        $id = $param;

        $data['category_data'] = $categoryModel->where('parent_id', $id)->orderBy('id', 'DESC')->paginate(25);

        $data['pagination_link'] = $categoryModel->pager;

        $data['category_count'] = $categoryModel->where('parent_id', 0)->countAllResults();

        return view('admin/pages/view_subcategory', $data);
    }
}