<?php
defined('BASEPATH') or exit('No direct script access allowed');

//https://stripe.com/docs/testing#cards

class Payment extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in == FALSE) {
			redirect(base_url() . "Login");
		}
		$data['site'] = $this->OH->getsitedata();
		$data['vdata'] = $this->OH->getvendor($this->session->vid);
		
		//die($this->session->vid);
	}
	
	public function index()
	{
	    
	    $pid=$this->input->post('pid');
	    $vid=$this->input->post('vid');
	    
	    //plan data
	    $this->db->select('*');
        $this->db->from('vendor_membership_plan');
        $this->db->where('id',$pid);
		$query = $this->db->get();
		$plandata=$query->result();
		$plandata=$plandata[0];
		$data['plandata']=	$plandata;
		
		//get vendor detials
		$this->db->select('*');
        $this->db->from('wedding_planner');
        $this->db->where('id',$vid);
		$query = $this->db->get();
		$vdata=$query->result();
		$vdata=$vdata[0];
		$data['vdata']=$vdata;
		$this->session->set_userdata('data', $data);
	    
	}
	public function paymentCheckOut()
	{
	    if(!$this->session->data)
	    {
	        redirect(base_url());
	    }
	    
	   	$this->db->select('*');
        $this->db->from('payment_method');
		$query = $this->db->get();
		$data['pymts']=$query->result();
		$data['site'] = $this->OH->getsitedata();
		$data['vdata'] = $this->OH->getvendor($this->session->vid);
	    $this->load->view('dashboard/paymentpage',$data);
	}
	
	public function check()
	{
		//check whether stripe token is not empty
		if(!empty($_POST['stripeToken']))
		{
			//get token, card and user info from the form
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];
			
			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";
			//set api key
// 			$stripe = array(
//                 "secret_key"      => ''.SSK.'',
//         		"publishable_key" => ''.SPK.''
// 			);
            $this->db->select('*');
    		$this->db->where('id', 9);//Stripe Id from databse
    	    $this->db->from('payment_method');
    	    $query = $this->db->get();
            $payment_method = $query->result();
            $payment_method=$payment_method[0];
			$stripe = array(
                "secret_key"      => ''.$payment_method->salt_access_code.'',
        		"publishable_key" => ''.$payment_method->key.''
			);
			
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $this->session->data['vdata']->email,
				'source'  => $token,
				'name' => $this->session->data['vdata']->planner_name.",".$this->session->data['vdata']->id,
                  'address' => [
                    'line1' => 'test',
                    'postal_code' => '98140',
                    'city' => 'test',
                    'state' => 'CA',
                    'country' => 'US',
                  ],
			));
			
			//item information
			$itemName = $this->session->data['plandata']->rates_name;
			$itemNumber = "ID: ".$this->session->data['plandata']->id." Plan Name: ".$this->session->data['plandata']->rates_name.",Vendor Name:".$this->session->data['vdata']->planner_name.",Vendor Id:".$this->session->data['vdata']->id;
			$itemPrice = $this->session->data['plandata']->plan_amount."00";
			$currency = "AUD";
			$orderID = date("Y-m-d H:i:s").random_string('alnum', 8);
			
			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $itemPrice,
				'currency' => $currency,
				'description' => $itemNumber,
				'metadata' => array(
					'item_id' => $itemNumber
				)
			));
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();

			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details 
				$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");
			
				
				// //insert tansaction data into the database
				// $dataDB = array(
				// 	'name' => $name,
				// 	'email' => $email, 
				// 	'card_num' => $card_num, 
				// 	'card_cvc' => $card_cvc, 
				// 	'card_exp_month' => $card_exp_month, 
				// 	'card_exp_year' => $card_exp_year, 
				// 	'item_name' => $itemName, 
				// 	'item_number' => $itemNumber, 
				// 	'item_price' => $itemPrice, 
				// 	'item_price_currency' => $currency, 
				// 	'paid_amount' => $amount, 
				// 	'paid_amount_currency' => $currency, 
				// 	'txn_id' => $balance_transaction, 
				// 	'payment_status' => $status,
				// 	'created' => $date,
				// 	'modified' => $date
				// );
                $vid=$this->session->data['vdata']->id;
                $pid=$this->session->data['plandata']->id;
				if ($this->OH->planchekout($vid,$pid,"True",$balance_transaction,"By Stripe")) {
				// 	if($this->db->insert_id() && $status == 'succeeded'){
					//	$data['insertID'] = $this->db->insert_id();
					//	$this->load->view('payment_success', $data);
						redirect(base_url()."Dashboard/showVendorPlan");
						// redirect('Welcome/payment_success','refresh');
				// 	}else{
				// 		echo "Transaction has been failed";
				// 	}
				}
				else
				{
				    $this->OH->planchekout($vid,$pid,"Flase",$balance_transaction,"By Stripe Fail Paymant");
					echo "not inserted. Transaction has been failed";
				}

			}
			else
			{
			    $this->OH->planchekout($vid,$pid,"Flase",$balance_transaction,"By Stripe Fail Paymant");
				echo "Invalid Token";
				$statusMsg = "";
			}
		}
	}

	public function payment_success()
	{
		redirect(base_url()."Dashboard/showVendorPlan");
	}

	public function payment_error()
	{
		$this->load->view('Dashboard/payment_error');
	}

	public function help()
	{
		$this->load->view('help');
	}
	public function acceptPayment()
	{
        $vid=$this->session->data['vdata']->id;
        $pid=$this->session->data['plandata']->id;
        $tid=rand(111111111,99999999999);
        $tid=date("Y-m-d H:i:s")+$tid;
        if($this->session->data['vdata']->StaffID!=0 && $this->session->data['vdata']->firstpayment=='open')
        {
            $data = array(
	        'StaffID'=>$this->session->data['vdata']->StaffID,
	        'Vid'=>$vid,
	        'createdate'=>date("Y-m-d"),
	        'affiliate'=>($this->session->data['plandata']->plan_amount)/2,
	        'payment'=>'No',
	        'status'=>"UNAPPROVED",
	        );
	        $this->db->insert('staff_Add_vendor', $data);
	        //claim Update on wedding planner
	        $data1['firstpayment']='claim';
            $this->db->where('id',$vid);
            $this->db->update('wedding_planner', $data1);
           
        }
        
		if ($this->OH->planchekout($vid,$pid,"True",$tid,"By Paypal")) {
		    
				redirect(base_url()."Dashboard/showVendorPlan");
		}
                                                    
	}
	public function chekoutnewbtn()
	{

	  require_once APPPATH."third_party/stripe/init.php";
\Stripe\Stripe::setApiKey('sk_test_51JUS4gKvjpg8DZH105Z3BGJpLaNxaBQe1D6b6eR8ubOf05gf8SgGBG3wsvqRGNI52oUUmfbzFT2SCh2qpXqWhAJ400i4LF1Viu');

echo "stripe-php version: " . \Stripe\Stripe::VERSION . "<br>";

die();
header('Content-Type: application/json');
$YOUR_DOMAIN = base_url();
$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # TODO: replace this with the `price` of the product you want to sell
    'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'payment_method_types' => [
    'card',
  ],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);
header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
	}
}