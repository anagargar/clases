<?php 
/**
 * Usersontroller.php is the users controller
 *
 * This module implement CRUD over users table.
 *
 * @author     Agustín Calderón <agustincl@gmail.com>
 * @copyright  Copyright 2012 Elemental. All Rights Reserved.
 * @license    http://creativecommons.org/licenses/by-nc-nd/3.0/es/CC-NC-ND
 * @category   PHP & MySQL Training
 * @package    Users
 * @subpackage file
 * @version    GIT $Id:$
 *
*/

// Inicializaciones
// $arrayUser=initArrayUser();


class usersController
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
		
	}
	
	public function selectAction()
	{
		$model = new Models_usersDbModel($this->config);
		$arrayUsers=$model->readUsers();
		$params=array('arrayUsers'=>$arrayUsers);
		$this->content=$this->view->renderView($this->config, 'users/select', $params);
	}
	
	public function insertAction()
	{
		
	}
	
	public function updateAction()
	{
		
	}
	
	public function deleteAction()
	{
		
	}
	
	public function __destruct()
	{
		$params=array('userName'=>'Agustin',
					  'content'=>$this->content);
		echo $this->view->renderLayout($this->config, 'layout_admin1', $params);
	}
}


