<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model', 'home');
	}

	public function index()
	{
		$data['title'] 	= 'Home';
		$data['games']	= $this->home->getAllGame();
		$data['banners'] = $this->home->getAllBanner();
		$data['page']	= 'pages/home/index';
		$this->load->view('layouts/app', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Detail Game';
		$data['game'] = $this->home->getGameById($id);
		$data['page'] = 'pages/home/detail';
		$this->load->view('layouts/app', $data);
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['title'] = 'Search Results';
		$data['games'] = $this->home->search($keyword);
		$data['banners'] = $this->home->getAllBanner(); // Optional jika ingin menampilkan banner juga di halaman hasil pencarian
		$data['page'] = 'pages/home/index'; // Atau buat halaman khusus untuk hasil pencarian
		$this->load->view('layouts/app', $data);
	}
}

/* End of file Home.php */
