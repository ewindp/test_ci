<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model('dashboard_m');
		$this->data['activenverified']=$this->dashboard_m->activenverified();
		$this->data['activewithproducts']=$this->dashboard_m->activewithproducts();
		$this->data['activeproducts']=$this->dashboard_m->activeproducts();
		$this->data['activeproductswithoutuser']=$this->dashboard_m->activeproductswithoutuser();
		$this->data['amountactiveproducts']=$this->dashboard_m->amountactiveproducts();
		$this->data['summarizedprice']=$this->dashboard_m->summarizedprice();
		$this->data['productsperuser']=$this->dashboard_m->productsperuser()->result();
		
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=ron&from=usd&amount=1",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain",
    "apikey: nsPHiJ5HfScIYsBqwdHJax84rTz5b9vp"
  ),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$this->data['response'] = json_decode(curl_exec($curl),true);

curl_close($curl);

		$this->load->view('dashboard',$this->data);
	}
	
}