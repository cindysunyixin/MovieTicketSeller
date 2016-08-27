<?php
//error_reporting(E_ERROR);
//error_reporting(E_ALL & ~E_NOTICE);



	class init{


		public $obj;
		public function __construct(){
			
		}
		//load a new object
		public function load($obj){
			if(!isset($this->obj[$obj])){
				$class_file = "class/".$obj.".cls.php";
				if(file_exists($class_file)){
					include $class_file;
				}
				else return false;
				$this->obj[$obj]= new $obj($this);
			}
			return $this->obj[$obj];
		}
		
		public function run(){
			$op = $this->load('operation');
			include 'class/conf.cls.php';
			$file_name = $op->url(0);
			$func_name = $op->url(1);
			//$file_name =app or user
			if(!$file_name) $file_name = 'app';
			if(!$func_name) $func_name='index';

			$module_file = 'app/'.$file_name.".php";
			if(!file_exists($module_file)){
				$module_file = 'app/app.php';
			}
			if(file_exists($module_file)){
				header('P3P: CP=CAO PSA OUR');
				header('Content-Type: text/html; charset='.HE);
				ini_set('date.timezone','America/New_York');
				date_default_timezone_set("America/New_York");
				include $module_file;
				$a =new $file_name($this);
				if(!method_exists($a, $func_name))
					$func_name = 'index';
				$a->$func_name();
			}
			else die('error:Unknown app to load, the app is '.$app);
		}



}
	

?>