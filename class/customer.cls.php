<?php
	interface icustomer{

	}

	class customer{
		public function __construct(&$G){
			$this->sql = $G ->load('sql');
			$this->db = $G ->load('db');
			$this->session = $G ->load('session');


		}

		public function islogin($id){
			if($this->session->sessionid == $id){
				$user = $this ->session->getSessionValue($id);
				$cond = is_null($user['sessionuserid'])&&is_null($user['sessionlogintime']);
				if(is_null($user['sessionuserid']))
					return true;
			}
			return false;
		}

		public function getUserByName($username){
			$data = array('*','user',array(array('and','username =:user_name','user_name',$username)));
			$sql = $this->sql->select($data);
			$user = $this ->db->fetch($sql);
			return $user;
		}

		public function getUserById($id){
			$data = array('*','user',array(array('and','userid =:id','id',$id)));
			$sql = $this->sql->select($data);
			$user = $this ->db->fetch($sql);
			return $user;
		}

		public function createRandImage($randCode = NULL,$width = 80, $height = 24,$mix = 40)
	    {
	    	$par = intval($width/4);
	    	$randCode = strval($randCode);
	    	$image = imagecreatetruecolor($width,$height);
	    	$gray = ImageColorAllocate($image,0xFF,0xFF,0xFF);
	    	imagefill($image,0,0,$gray);
	    	for($i = 0;$i<4;$i++)
	    	{
		    	$text_color = imagecolorallocate($image, rand(1,150), rand(1,150), rand(1,150));
				imagettftext($image,15,intval(rand(0,40)),8+$i*$par,23+rand(3,7), $text_color,'tpl/font/FZZYJW.TTF',$randCode[$i]);
	    	}
	    	for($i=0;$i<250;$i++)
			{
				$randcolor = ImageColorallocate($image,rand(0,255),rand(0,255),rand(0,255));
				imagesetpixel($image, rand(1,$width) , rand(1,$height) , $randcolor);
			}
	    	imagepng($image);
			imagedestroy($image);
			return $randCode;
	    }

	   public function randomString($length = 4) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}

?>