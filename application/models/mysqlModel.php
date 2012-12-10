<?php

class Models_mysqlModel
{
	
	protected $cnx;
	private static $instance;
	
	private function __construct($config)
	{
		$this->cnx = $this->connect($config);
	}
	
	public static function singleton($config)
	{
		if (!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c($config);
		}
	
		return self::$instance;
	}
	
	private function connect($config)
	{
		try
		{
			$db_connection = mysql_connect ($config['database.server'], 
											$config['database.user'],
											$config['database.password']);
			mysql_select_db ($config['database.db']);
			if (!$db_connection)
			{
				throw new Exception('MySQL Connection Database Error: ' . mysql_error());
			}
			else
			{
				$CONNECTED = true;
			}
		}
		catch (Exception $e)
		{
			echo $e->GetMessage();
		}
		
		return $db_connection;
	}
	
	private function disconnect()
	{
		return mysql_close($this->cnx);
	}
	
	public function query($sql)
	{
		
		$arrayData = Null;
		try 
		{
			
			$result=mysql_query($sql, $this->cnx);
			if (!$result)
			{
				throw new Exception('MySQL Query Error: ' . mysql_error());
			}
			else
			{
				if(is_resource($result))
					while($row=mysql_fetch_array($result,MYSQL_ASSOC))
					{
						$arrayData[]=$row;
					}
				else
					$arrayData[]=$result;
			}
		}
		catch (Exception $e)
		{
			echo $e->GetMessage();
		}
		
		
		return $arrayData;
	}
	
	public function __destruct()
	{
		return;
	}

}
