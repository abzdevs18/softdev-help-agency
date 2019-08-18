<?php

/**
 * 
 */
class App
{
	protected $controller = 'home';

	protected $method = 'index';

	protected $params = [];

	public function __construct(){
		$url = $this->parseUrl();

		/**
		* What this code below do is it checks the paramerters in url and check if
		* A file is exist if its not then it will require the home.php file which is the
		* default one
		*/
		if (file_exists('../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller=new $this->controller;

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		/*
		* If the url dont have any parameter: since url expects array of parameters
		* That is why we give it an empty array so that it will not throw error if
		* we dont have any param in our url
		*/
		$this->params = $url ? array_values($url) : [];
	}

	public function parseUrl(){
		if(isset($_GET['url'])){
			/**
			* Sanitizing the url
			*/
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}