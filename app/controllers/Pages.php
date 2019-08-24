<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{

		// $this->Model = $this->model('Post');
	}

	public function index(){
		// $posts = $this->Model->getPosts();

		$data = [
			'title' => 'Welcome'
			// 'posts' => $posts
		];
		$this->view("pages/index", $data);

	}

	public function about(){
		$data = [
			'title' => 'Welcome to about'
		];
		$this->view("pages/about", $data
	);
	}
}