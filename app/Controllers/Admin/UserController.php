<?php



namespace App\Controllers\Admin;



use App\Controllers\BaseController;

use App\Models\AdminModel;
use App\Models\Country;




class UserController extends BaseController

{

    public function __construct()

    {

        if (session()->get('customer_type') != "0") {

            echo 'Access denied';

            exit;

        }

    }

    public function users()

    {

        $adminModel = new AdminModel();

        $countryModel = new Country();

        $data['country'] = $countryModel->first();
        
        $data['user_data'] = $adminModel->orderBy('id', 'DESC')->paginate(25);



        $data['pagination_link'] = $adminModel->pager;



        return view('admin/pages/users', $data);

    }



    public function users_data($param = "$1"){

        

        $id = $param;

        $adminModel = new AdminModel();

        $data['user_data'] = $adminModel->where('id', $id)->first();

        return view('admin/pages/profile', $data);

    }



    public function update_status()

    {

        $model = new AdminModel();

        $id = $this->request->getPost('id');

        // echo var_dump($this->request->getPost('id'));

        

        $data = array(

            'is_active'  => $this->request->getPost('is_active'),

        );

        $model->updateStatus($data, $id);

        return redirect()->to('/admin/users');

    }

    public function delete()

    {

        $model = new AdminModel();

        $id = $this->request->getPost('product_id');

        $model->deleteProduct($id);

        return redirect()->to('/product');

    }



}