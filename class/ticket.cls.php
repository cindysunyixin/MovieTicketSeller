<?php
class ticket extends movie{
	public $userid;
	public $movie_name;
	
	public function get_theater(){
		$data = array("*","theater_list");
		$sql= $this->sql->select($data);
		return $this->db->fetchAll($sql);
	}
	public function get_prefered_theater(){
		//$this->op->test($_SESSION);
		$userid = $_SESSION['user']['sessionuserid'];
		//$data = array('*','session',array(array('and','sessionid =:sid','sid',$sessionid)));
		$data = array("*","saved_theater",array(array('and','userid =:uid','uid',$userid)));
		$sql= $this->sql->select($data);
		return $this->db->fetchAll($sql);
		}
	public function get_prefer_theater_by_name($theater_name) {
		$userid = $_SESSION['user']['sessionuserid'];
		//$movie_name = $_SESSION['select_movie']['name'];
		//array('and','movie_name =:m_name','m_name',$movie_name),
		//$data = array('*','session',array(array('and','sessionid =:sid','sid',$sessionid)));
		$data = array("*","saved_theater",array(array('and','userid =:uid','uid',$userid),array('and','name =:t_name','t_name',$theater_name)));
		$sql = $this->sql->select($data);
		$a= $this->db->fetch($sql);
		if($a){
			$a['address'] = $a['address'].', '.$a['city'].', '.$a['state'];
		}
		return $a;
	}
	//insert a record to theater table with theater info and movie name
	public function addmovie_theater($theater,$movie){
		$theater['movie_name'] =$movie;
		$data = array('theater',$theater);
		$sql = $this->sql->insert($data);
		//$this->op->test($sql);
		$a= $this->db->exec($sql);
		return $a;
	}
	public function addmovie_schedule($args){
		$data = array('movie_time',$args);
		$sql = $this->sql->insert($data);
		//$this->op->test($sql);
		$a= $this->db->exec($sql);
		return $a;
	}

	public function delete_theater($name){
		$userid = $_SESSION['user']['sessionuserid'];
		$data = array("saved_theater",array(array('and','userid =:uid','uid',$userid),array('and','name =:t_name','t_name',$name)));
		$sql = $this->sql->delete($data);
		$a = $this->db->exec($sql);
		if($a){
			$this->op->swal('Success','This theater has beem removed','success');
		}
		else{
			$this->op->swal('Can not process your request, please try later','','error');	
		}
	}


	public function search_theater($search_info,$movie_name){
		$sql['sql'] = "select * from theater where (name like :t_name or city like :t_city or state like :t_state) and movie_name =:m";
		$sql ['value'] = array("t_name"=>"%".$search_info."%", "t_city"=>"%".$search_info."%", "t_state"=>"%".$search_info."%",'m'=>$movie_name);
		//$this->op->test($sql);
		$a = $this->db->fetchAll($sql);
		if($a){
			foreach ($a as $key => $value) {
				$a[$key]['address'] = $value['address'].', '.$value['city'].', '.$value['state'];
			}
		}
		return $a;
	}


	public function get_theater_by_name($theater_name) {
		$movie_name = $_SESSION['select_movie']['name'];
		$data = array("*","theater",array(array('and','movie_name =:m_name','m_name',$movie_name),array('and','name =:t_name','t_name',$theater_name)));
		$sql = $this->sql->select($data);
		$a = $this->db->fetch($sql);
		if($a){
			$a['address'] = $a['address'].', '.$a['city'].', '.$a['state'];
		}
		return $a;
	}
	public function save_theater($theater){
		$data = array('saved_theater', 
			array(
				'name'=>$theater['name'],
				'address'=>$theater['address'],
				'userid' =>$_SESSION['user']['sessionuserid'],
				));
		$sql = $this->sql->insert($data);
		$a= $this->db->exec($sql);
		if(!$a) 
			$this->op->swal('warning','The theater is already saved','warning');
	}
	public function get_saved_card(){
		$data = array('number,name,cvv,expiration','saved_card',array(array('and','userid =:id','id',$_SESSION['user']['sessionuserid'])));
		$sql = $this->sql->select($data);
		//$this->op->test($sql);
		$a = $this->db->fetchAll($sql);
		//$this->op->test($a);
		return $a;
	}

	public function save_card($args){
		$args['expiration'] = date('Y-m-d H:i:s',strtotime($args['expiration']));
		$data = array('saved_card',$args);
		$sql = $this->sql->insert($data);
		//$this->op->test($sql);
		$a= $this->db->exec($sql);
		//$this->op->test($sql);
	}
	public function process_payment($args){
		//$data = 
		$args['id'] = uniqid();
		$args['date'] = $args['date_with_time'];
		unset($args['date_with_time']);
		unset($args['time']);
		$args['status'] = 'Unused';
		$data = array('order_detail',$args);
		$sql = $this->sql->insert($data);

		//$this->op->test($sql);
		$a= $this->db->exec($sql);
		$_SESSION['orderID'] = $args['id'];
		if($a) return $args['id'];
		else 	return false;
	}

	public function complete_order($name){
		$sql['sql'] = "select * from order_detail where movie_name =:name and status =:status and userid =:uid";
		$sql['value'] = array('name'=>$name,'status'=>'Complete','uid'=>$_SESSION['user']['sessionuserid']);
		$a=  $this->db->fetch($sql);
//		return 1;
		if($a) return true;
		else return false;
	}
	public function discount($a){
		$sql['sql'] = "select $a from system where 1";
		$sql['value'] = array();
		//$this->op->test($sql);
		$a=  $this->db->fetch($sql);
		return $a;
	}	
	
}

?>
