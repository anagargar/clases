<?php 


class indexController
{
	public $content;
	public $view;
	protected $config;
	
	public function __construct($config)
	{
		$this->view = new Models_applicationModel();
		$this->config = $config;
	}
	public function indexAction()
	{
		$this->content=$this->view->renderView($this->config, 'index/index', array());
	}
	
	public function __destruct()
	{
		echo $this->view->renderLayout($this->config, 'layout_front', array());		
	}
	
}







