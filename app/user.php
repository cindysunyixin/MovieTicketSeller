<?php
class user{
	public function __construct(&$G){
		$this->session = $G->load('session');
		$this->user = $G->load('customer');
		$this->manager = $G->load('manager');
		$this->tmpl = $G->load('template');
		$this->op = $G->load('operation');
		$this->sql = $G->load('sql');
		$this->db = $G->load('db');
		$this->default_groupid=1;
		$this->user_data = $this->session->getSession();

		//$this->op->test($this->user_data);
		//$this->op->test($_SESSION);
		//$this->op->test($_POST);
		
		if($this->user_data['sessionstatus']==1 && time()-$this->user_data['sessionmodifytime']<3600){

			header('location:index.php?app-index');
			exit();
		}
		
	}
	public function index(){
		$this->login();
	}
	public function login(){
	
		if($this->op->post('login')){

			$args= $this->op->post('args');
			if(strtoupper($args['randcode'])== $_SESSION['rand']){

				$user =$this->user->getUserByName($args['username']);

				if($user['password']==md5($args['userpassword'])){
					$a=array(
						'sessionuserid'=>$user['userid'],
						//'sessionusername'=>$user['name'],
						'sessionpassword'=>$user['password'],
						'sessionemail'=>$user['email'],
						'sessiongroupid'=>$user['usergroupid'],
						'sessionmodifytime'=>TIME(),
						'sessionstatus' =>1
						);
					$this->session->setSession($a);
					$a['username'] = $user['username'];
					$_SESSION['user'] = $a;

					if($user['usergroupid']==1)
						$this->op->swal("Success",'Redircting please wait','success','index.php?app-index',1500);
					else
						$this->op->swal("Success",'Redircting please wait','success','index.php?manager-index',1500);
					exit;
					//header('location:index.php?app-index');
					//exit;
				}
				exit();
			}
		}
		//exit();
		$this->tmpl->display('login');
	}

	public function register(){
		if($this->op->post('register')){
			
			$name = $this->op->post('username');
			$password = $this->op->post('password');
			$confirm = $this->op->post('confirm');
			$manager_password = $this->op->post('manager_password');
			$email = $this->op->post('email');

			if(!$name or !$password or !$confirm or !$email){
				$this->op->swal('Illegal input','All field must be filled','error','index.php?user-register');
				exit();
			}
			if($password!=$confirm){
				$this->op->swal('Password doesn\'t match','confirm password must match passwrod','error','index.php?user-register');
				exit();
			}
			if($manager_password){
				$pwd = $this->manager->get_manager_password();
				if($manager_password == $pwd['manager_password']){
					$data = array('user',array('username'=>$name,'password' =>md5($password),'email'=>$email,'usergroupid'=>2));	
				}
				else{
					$this->op->swal('Can not register','Incorrect manager password','error','index.php?user-register');
					exit();
				}
			}
			else
				$data = array('user',array('username'=>$name,'password' =>md5($password),'email'=>$email,'usergroupid'=>$this->default_groupid));
			$sql = $this->sql->insert($data);
			$a =$this->db->exec($sql);
			if($a){
				$user =$this->user->getUserByName($name);
				$a=array(
						'sessionuserid'=>$user['userid'],
						'sessionpassword'=>$user['password'],
						'sessionemail'=>$user['email'],
						'sessiongroupid'=>$user['usergroupid'],
						'sessionmodifytime'=>TIME(),
						'sessionstatus' =>1
						);
				$this->session->setSession($a);
				$a['username'] = $user['username'];	
				$_SESSION['user'] = $a;
				if($user['usergroupid']==1)
					$this->op->swal("Success",'Redircting please wait','success','index.php?app-index',1500);
				else
					$this->op->swal("Success",'Redircting please wait','success','index.php?manager-index',1500);
				exit;
			}
			else{
				$this->op->swal('fail to register','','error');
			}
		}
		else{

		}
		$this->tmpl->display('register');
	}

	public function randcode()
	{	
		$rand = $this->user->randomString();
		$_SESSION['rand'] = $rand;
		header("Content-type: image/png");
		echo $this->user->createRandImage($rand,67,30);
	}
}

?>
