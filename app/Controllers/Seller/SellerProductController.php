<?php



namespace App\Controllers\Seller        ;



use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\SubscriptionPlansModel;
use App\Models\BrandsModel;
use App\Models\CategoryModel;
use App\Models\TaxModel;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\PostAdsModel;
use App\Models\PostGalleryModel;



class SellerProductController extends BaseController

{
    public function __construct()
    {
        if (session()->get('customer_type') != "1") {
            // echo 'Access denied';
            return redirect()->to('login')->with('status', 'Sorry You have no permissions to access this page.');
            exit;
        }
    }

    public function index()

    {
        $user_id = session()->get('id');
        $categoryModel = new CategoryModel();
        $categoryselect = array(
            'parent_id' => 0,
            'is_active' => 1
        );
        $data['categories'] = $categoryModel->where($categoryselect)->findAll();
       
        $BrandModel = new BrandsModel();
        $data['brands'] = $BrandModel->findAll();

        $TaxModel = new TaxModel();
        $data['tax'] = $TaxModel->findAll();

        $CountryModel = new Country();
        $data['country'] = $CountryModel->findAll();

		$SubscriptionModel = new SubscriptionPlansModel();
		$where = array(
			'status' => 1
		);
        $data['subscriptionPlans'] = $SubscriptionModel->where($where)->findAll();

		// Load mapbox key
		$data['PK_MAPBOX'] = env('MAPBOX_PUBLIC_TOKEN');
        $data['title'] = 'Post Add' ;
        return view('frontend/Seller/create-product', $data);
       

    }
	public function add_posts(){
		
		helper(['form', 'url']);
		$postaddModel = new PostAdsModel();
		$data = [
			'seller_id' =>  $this->request->getVar('seller_id'),
			'ad_type' => $this->request->getVar('ad_type'),
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'stocks' => $this->request->getVar('stocks'),
			'currency' => $this->request->getVar('currency'),
			'duration' => $this->request->getVar('duration'),
			'amount' => $this->request->getVar('amount'),
			'category_id' => $this->request->getVar('category_id'),
			'sub_category_id' => $this->request->getVar('sub_category_id'),
			'brand_id' => $this->request->getVar('brand_id'),
			'vendor_name' => $this->request->getVar('vendor_name'),
			'phone_number' => $this->request->getVar('phone_number'),
			'provider_desc' => $this->request->getVar('provider_desc'),
			'address_line_1' => $this->request->getVar('address_line_1'),
			'address_line_2' => $this->request->getVar('address_line_2'),
			'vendor_country' => $this->request->getVar('country'),
			'vendor_state' => $this->request->getVar('state'),
			'vendor_city' => $this->request->getVar('city'),
			'pincode' => $this->request->getVar('postcode'),
			'deopsite' => $this->request->getVar('deposit'),
			'deposite_duration' => $this->request->getVar('deposite_duration'),
			'deposite_amount' => $this->request->getVar('deposite_amount'),
			'demage' => $this->request->getVar('demage'),
			'demage_amount' => $this->request->getVar('demage_amount'),
			
			'product_detail' => $this->request->getVar('product_desc'),
			'about_product' => $this->request->getVar('product_about'),
			'things_to_know_desc' => $this->request->getVar('things_to_know_desc'),
			'cancellation_policy' => $this->request->getVar('cancellation_policy'),
			'listing_address1' => $this->request->getVar('listing_address1'),
			'listing_address2' => $this->request->getVar('listing_address2'),
			'country_list' => $this->request->getVar('country_list'),
			'state_list' => $this->request->getVar('state_list'),
			'city_list' => $this->request->getVar('city_list'),
			'postcode_list' => $this->request->getVar('postcode_list'),
			'latitude' => $this->request->getVar('latitude'),
			'longitude' => $this->request->getVar('longitude'),
			'daterange' => $this->request->getVar('daterange'),
		];
		
		$from_date=NULL;
		$to_date=NULL;
		if(empty($this->request->getVar('daterange'))){
			$dates=explode("-",$this->request->getVar('daterange'));
			if(count($dates)>0){
					$from_date=$dates[0];
					$to_date=$dates[1];
			}
		}
				  
		$result = $postaddModel->save($data);
		
		$post_id =$postaddModel->insertID;
		
		if ($result) {

			$PostGalleryModel = new PostGalleryModel();
			// if($imagefile = $this->request->getFileMultiple('images'))
				if($imagefile=$this->request->getFiles())
				{
				    if(!empty($imagefile['images'][0]->getClientName())){
						foreach ($imagefile['images'] as $file) {
			 
			                
								$newName = $file->getRandomName();
								$file->move(ROOTPATH.'public/uploads/seller-products', $newName);
								$data = [
								'seller_id'=>$this->request->getVar('seller_id'),
								'post_id'=>$post_id,
								'post_image'=>$file->getClientName(),
								'image_name'=>$newName,
									
								];
								$PostGalleryModel = new PostGalleryModel();
								$PostGalleryModel->save($data);	
			                
						}
				    }
					
				}

			
			return $this->response->setJSON(['status' => 'success', 'message' => 'Product Added Successfully']);
		}
		return $this->response->setJSON(['status' => 'failed', 'message' => 'Failed to Update Product']);
	}
	public function get_price()
	{
        
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_price')
			{
				$topplanModel = new SubscriptionPlansModel();

				$plandata = $topplanModel->where('id', $this->request->getVar('plans_id'))->findAll();

				echo json_encode($plandata);
			}

		}
	}

    public function get_subcategory()
	{
        
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_subcategory')
			{
				$subCategoryModel = new CategoryModel();

				$statedata = $subCategoryModel->where('parent_id', $this->request->getVar('category_id'))->findAll();

				echo json_encode($statedata);
			}

		}
	}

    public function get_state()
	{
       
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');
            
			if($action == 'get_state')
			{
				$StateModel = new State();

				$statedata = $StateModel->where('country_id', $this->request->getVar('country_id'))->findAll();

				echo json_encode($statedata);
			}

		}
	}

    public function get_city()
	{
        
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_city')
			{
				$cityModel = new City();

				$citydata = $cityModel->where('state_id', $this->request->getVar('state_id'))->findAll();

				echo json_encode($citydata);
			}

		}
	}





}

