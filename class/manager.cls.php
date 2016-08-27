<?php
class manager{
		public function __construct(&$G){
			$this->sql = $G ->load('sql');
			$this->db = $G ->load('db');
		}
		function get_manager_password(){
			$sql['sql'] = "select manager_password from system where 1";
			$sql['value']=array();;
			$pwd = $this->db->fetch($sql);
			return $pwd;
		}
}