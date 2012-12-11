<?php

class Application_bootstrap
{
	protected $configFile;
	protected $config;
	protected $request;
	
	public function __construct($filename)
	{
		
		$this->configFile = $filename;
		
		$this->_initSession();
		$this->_initConfig();
		$this->_initDb();
		$this->_initRequest();
		$this->_initDefaultRol();
// 		$this->_initAcl();
		Models_debugModel::_debug($_SESSION);
		

		
		
	}
	
	protected function _initSession()
	{

		session_start();
		if(!isset($_SESSION[$this->config['sessionNamespace']]))
			$_SESSION[$this->config['sessionNamespace']]=array();
	}
	
	protected function _initConfig()
	{
		$this->config=Models_applicationModel::readConfig('../application/configs/'.$this->configFile, 
													APPLICATION_ENV);
	}

	protected function _initDb()
	{
		$_SESSION['register']['db']=Models_mysqlModel::singleton($this->config);
	}
	
	protected function _initRequest()
	{
		$this->request=Models_applicationModel::setRequest();
	}
	
	protected function _initDefaultRol()
	{
		$_SESSION[$this->config['sessionNamespace']]['user_rol']=$this->config['defaultRol'];
	}
	
	protected function _initAcl()
	{
		$this->request=Models_applicationModel::acl($this->request, $this->config);
	
	}
	
	public function run()
	{
		Models_debugModel::_debug($this->request);
		include("../application/controllers/".$this->request['controller'].".php");
		$class=$this->request['controller']."Controller";
		$method = $this->request['action']."Action";
		$obj = new $class($this->config);
		$obj->$method();
				
	}
}















