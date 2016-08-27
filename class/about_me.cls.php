<?php
class about_me{
	public function __construct(&$G){
		$this->session = $G->load('session');
		$this->user = $G->load('customer');
		$this->tmpl = $G->load('template');
		$this->op = $G->load('operation');
		$this->sql = $G->load('sql');
		$this->db = $G->load('db');
	}
	public function get_order_history($id){
		$data = array("*",'order_detail',array(array('and','userid =:id','id',$id)));
		$sql = $this->sql->select($data);
		$a = $this->db->fetchAll($sql);
		//$this->op->test($a);
		return $a;
	}

	public function get_order_by_id($id){
		$data = array("*",'order_detail',array(array('and','id =:id','id',$id)));
		$sql = $this->sql->select($data);
		$a = $this->db->fetchall($sql);
		//$this->op->test($sql);
		//$this->op->test($a);
		//var_dump($a);
		return $a;
	}

	public function get_order_by_status($status){
		$data = array("*",'order_detail',array(array('and','status =:s','s',$status)));
		$sql = $this->sql->select($data);
		$a = $this->db->fetchAll($sql);
		return $a;
	}

	public function check_order_status(){
		$data = array('order_detail',array('status'=>'Complete'),
			array(
				array('and','date <:d','d',date('Y-m-d H:i:s',time())),
				array('and','status =:s','s','Unused')
				));
		//$data = array('session',array('sessionuserid'=>$vaule),array(array('and','sessionid =:sid','sid',$this->sessionid)));
		$sql = $this->sql->update($data);
		$a = $this->db->exec($sql);
	}

	public function update_order($args,$id){
		$sql['sql'] = 'delete from order_detail where id=:id';
		$sql['value'] = array('id'=>$id);
		$a= $this->db->exec($sql);
		$data = array('order_detail',$args);
		$sql=$this->sql->insert($data);
		$a= $this->db->exec($sql);
	}

	public function cancel_order($args,$id){
		$sql['sql'] = 'delete from order_detail where id=:id';
		$sql['value'] = array('id'=>$id);
		$a= $this->db->exec($sql);
		$args['status'] = 'Cancelled';
		$args['refund'] = $args['total_price']-5;
		$data = array('order_detail',$args);
		$sql=$this->sql->insert($data);
		$a= $this->db->exec($sql);
		if($a){
			$this->op->swal('You order has been cancelled','Refunds will be credited in a fews days','success','index.php?app-order_history');
		exit;
		}
	}
	public function get_card_by_userid($userid){
		$data = array("*","saved_card",array(array('and','userid =:id','id',$userid)));
		$sql = $this->sql->select($data);
		$a = $this->db->fetchAll($sql);
		return $a;
	}

	public function delete_card_by_num($num){
		$sql['sql'] ="delete from saved_card where number =:num";
		$sql['value'] = array('num'=>$num);
		$a = $this->db->exec($sql);
		if($a){
			$this->op->swal('Success','This card has beem removed','success');
		}
		else{
			$this->op->swal('Can not process your request, please try later','','error');	
		}
	}
}
?>
