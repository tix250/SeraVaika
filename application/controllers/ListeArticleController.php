<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeArticleController extends CI_Controller {
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function location($page)
	{
		
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data=array();
		$data['vue']='cars.php';
		$data['title']='Les locations';
		$data['title2']='Les locations';
		$data['allCategories']=$article->allCategories();
		$data['allPlaces']=$article->allPlaces();
		$data['allData']=$article->getAllLocation();
		$results_per_page = 4;  
		$page_first_result = ($page-1) * $results_per_page;  
		$data['data']=$article->getLocation($page_first_result, $results_per_page);
		$number_of_result=$data['allData']->num_rows();
		$data['page']=$page;
		$data['type']="location";
		$number_of_page = ceil ($number_of_result / $results_per_page); 
		$data['nombre']=$number_of_page;
		$this->load->view('template',$data);
	}	
	public function ventes($page)
	{
		$results_per_page = 4;  
		$page_first_result = ($page-1) * $results_per_page; 
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data=array();
		$data['vue']='cars.php';
		$data['title']='Les ventes';
		$data['title2']='Les ventes';
		$data['allCategories']=$article->allCategories();
		$data['allPlaces']=$article->allPlaces();
		$data['allData']=$article->getAllVente();
		$results_per_page = 4;  
		$page_first_result = ($page-1) * $results_per_page;  
		$data['data']=$article->getVente($page_first_result, $results_per_page);
		$data['page']=$page;
		$data['type']="ventes";
		$number_of_result=$data['allData']->num_rows();
		$number_of_page = ceil ($number_of_result / $results_per_page); 
		$data['nombre']=$number_of_page;
		$this->load->view('template',$data);
	}	
	public function carsDetails($idCar)
	{
		$data=array();
		$data['vue']='car-details.php';
		$data['title']='Details';
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$data['data']=$article->getCarInfo($idCar);
		$data['images']=$article->getAllImages($idCar);
		$i=$data['images']->result_array();
		$data['first']=($i[0]['pathImage']);
		// session user debut
            // $this->session->set_userdata('user',1);
            // if($this->session->has_userdata('user')){
            //     $data['user']=$this->session->userdata('user');
            //     $data['action']="addToCart/".$data['user']."/".$idCar."/".$data['data']['prix'];
            //     $this->load->model('listeArticle');
            //     $article=new listeArticle();
            //     if($article->isInCart($data['user'],$idCar)){
            //         $data['flag']="hehehehehehe";
            //     }
            // }
            // else{
            //     $data['action']="login";
            // }
		// session user fin
		$this->load->view('template',$data);
	}	
	public function addToCart($idUser,$idCar,$price){
		$this->load->model('listeArticle');
		$article=new listeArticle();
		$article->addToCart($idUser,$idCar,$price);
		redirect(site_url_spx('welcome/carsDetails/'.$idCar));
	}
}
