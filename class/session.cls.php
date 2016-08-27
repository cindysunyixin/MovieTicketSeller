<?php

interface isession{
	public function getsessionid();
	public function getSessionValue();
	public function getSession();
	

}

	class session implements isession{
		public $G;
		public $session_name = 'user';
		public $session_user = false;
		public $sessionid;

		public function __construct(&$G){
			//$this->G=$G;
			$this->db = $G->load('db');
			$this->sql = $G->load('sql');
			//$this->user = $G->load('user');
			//$this->sql_test = $G->load('sql_test');
			$this->op = $G->obj['operation'];
			session_start();
			$this->getsessionid();
			
		}
		public function getsessionid(){
			$this->sessionid = $this->op->getCookie('PHPSESSID');
			if(!$this->sessionid){
				//sessionid doesn't exit			
				$this->sessionid = session_id();
				$_SESSION['sessionid'] = $this->sessionid;
				$a = $this->getSessionValue($this->sessionid);
				if(!$a){
					//session doesn't exist, create session
					$data = array('session',array('sessionid'=>$this->sessionid, 'sessionmodifytime'=>TIME()));
					$sql = $this->sql->insert($data);
					$this->db ->exec($sql);
				}
				$_SESSION['status'] = 0;
				return $this->sessionid;
			}

		}
		public function getSessionValue($sessionid =null,$uid=null){
			if(!$sessionid){
				if(!$this->sessionid) 
					$this->sessionid = $this->getsessionid();
				$sessionid = $this->sessionid;
			}
			if($uid)
				$data = array('*','session',array(array('and','sessionid =:sid','sid',$sessionid),array('and','sessionuserid =:uid','uid',$uid)));
			else
				$data = array('*','session',array(array('and','sessionid =:sid','sid',$sessionid)));
			$sql = $this->sql->select($data);
			return $this->db->fetch($sql);


		}
		public function getSession(){
			//if session_user is set, return directly
			//这个function有待考虑，这么写不合适
			//if($this->session_user) return $session_user;
			$uid = $this->op->getCookie('uid');

			$psid = $this->op->getCookie('PHPSESSID');
			//$this->op->test($psid);
			//$this->op->test($data);
			$session = $this->getSessionValue($psid,$uid);
			//$this->op->test($psid);
			
			return $session;
			//$this->op->test($user);
			//exit();
		}

		public function setSession($args){
			if(!is_array($args)) return false;
			if(!$this->sessionid)$this->sessionid=$_SESSION['user']['sessionid'];
			$data= array('session',array(array('and','sessionuserid =:uid','uid',$args['sessionuserid']),array('and','sessionid =:sid','sid',$this->sessionid)));
			$sql = $this->sql->delete($data);						
			$a = $this->db->exec($sql);
			$args['sessionid']= $this->sessionid;
			$args['sessionmodifytime']= time();
			$data = array('session',$args);
			$sql = $this->sql->insert($data);
			$a=$this->db->exec($sql);
			//$this->op->test($sql);
			//$args = $this->op->encode($args);
			//一小时之内不用重复登录，每次更新session，就重新计时
			$this->op->setCookie('uid',$args['sessionuserid'],3600);
			return $a;
		}

		public function setSessionValue($value){
			$data = array('session',array('sessionuserid'=>$vaule),array(array('and','sessionid =:sid','sid',$this->sessionid)));
			$sql = $this->sql->update($data);
			return $this->db->exec($sql);
		}
		public function setSessionStatus($status){
			$data = array('session',array('sessionstatus'=>$status),array(array('and','sessionid =:sid','sid',$this->sessionid)));
			$sql = $this->sql->update($data);
			return $this->db->exec($sql);
		}
		public function setSessionModifytime(){
			$data = array('session',array('sessionmodifytime'=>TIME()),array(array('and','sessionid =:sid','sid',$_SESSION['sessionuer']['sessionid'])));
			$sql = $this->sql->update($data);
			return $this->db->exec($sql);
		}
/*关于session的一点想法：
	cookie id和session id是一致的
	cookie中应该包括user status, 如果user status是logout，直接跳到login page, 如果是login，则去数据库中做进一步检查
	session包括以下的信息
		session id
		session userid
		session password
		session email
		session groupid
		session modify time(最后modify的时间)
		session value(这里面存放用户退出时的$_SESSION)
		session status(0--- 用户logout和1---用户没有logout)
	当用户访问网站时，先根据cookie中的session id获取session，然后检查session status，如果是0直接跳转到login页面，如果是1，继续检查session modify time，如果距离last modify在2小时之内，继续检查cookie中的user id是否和session userid相同，相同则不用登陆，反之则需要重新登陆。 

	登陆后，用user id查询session表，如果有匹配，$_SESSION = session value，更新该用户的session，同时将该用户的session id写在cookie中

	直接关闭浏览器或者页面和logout的区别：
		关闭页面会导致从登陆到关闭页面这段时间内所有的操作丢失
		logout不会出现这种情况，因为logout时所有的信息都会被妥善保存在db中
*/
		public  function clearSession(){
			if(!$this->sessionid)$this->getSessionId();
	    	$this->setSessionModifytime();
	    	$this->setSessionStatus(0);
			session_unset();
		}


	}


?>
