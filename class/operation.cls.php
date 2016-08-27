<?php
class operation{
	public $obj;
	public $get;
	public $post;
	public $url;
	private $key='this key is for cs_4400 project.';

	public function __construct(&$G){
		//$this->obj = $obj;
		$this->request = $_REQUEST;
		//$this->setcookie();
		$this->cookie = $_COOKIE;
		//echo "<pre>";
		//print_r($this->cookie );

		//echo "</pre>";
		//exit();
		$this->url = $this->parseurl();
	}

	public function swal($str,$mes=null,$type =null,$redirect=false,$time=2000){
		$string = '<script type="text/javascript">'.'
			setTimeout(function () {swal("$str","$mes","$type")});';
		if($redirect)
			$string = $string."\n setTimeout(function(){ window.location.href = '".$redirect."';},$time);";
		$string = $string.'</script>';   			
		$pos1 = strpos($string,'$str');
		$pos2 = strpos($string,'$mes');
		$pos3 = strpos($string,'$type');
		$sub_str1 = substr($string,0, $pos1);
		$sub_str4 = substr($string,$pos3+5, strlen($string)-$pos3-5);
		$string = $sub_str1.$str.'","'.$mes.'","'.$type.$sub_str4;
		echo "<script src='sweetalert_master/dist/sweetalert.min.js'></script>
		<link rel='stylesheet' type='text/css' href='sweetalert_master/dist/sweetalert.css'>";
		echo $string;
	}

	public function test($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}

	public function parseurl()
	{
		if(isset($_REQUEST['route']))
		{
			$r = explode('-',$_REQUEST['route']);
			foreach($r as $key => $p)
			{
				$r[$key] = urlencode($p);
			}
			return $r;
		}
		elseif(isset($_SERVER['QUERY_STRING']))
		{
			$tmp = explode('#',$_SERVER['QUERY_STRING'],2);
			$tp = explode('&',$tmp[0],2);
			$r = explode('-',$tp[0]);
			foreach($r as $key => $p)
			{
				$r[$key] = urlencode($p);
			}
			return $r;
		}
		else return false;
	}

	public function url($par)
    {
    	$par = intval($par);
    	if(isset($this->url[$par]))return $this->url[$par];
    	else return false;
    }



	public function get($key){
		if(isset($_REQUEST[$key])) return $_REQUEST[$key];
		else return false;
	}

	public function post($key){
		if(isset($_POST[$key])) return $_POST[$key];
		else return false;
	}

	public function setCookie($name,$value,$time=3600)
    {	
    	if($time)$time = TIME + $time;
		else $time = 0;
		//$time =TIME+30;
		setCookie($name,$value,$time,'/','',false,false);
    }

	public function getCookie($par)
    {
    	if(isset($this->cookie[$par]))return $this->cookie[$par];
    	else return false;
    }
    //http://localhost/cs4400/index.php?abc&act=xxx
    //这个function返回function_name,在上面的例子中，function_name是abc
    public function operation_name(){
    	if(isset($_SERVER['QUERY_STRING'])){
    		$b=explode('&',$_SERVER['QUERY_STRING']);
			return $b[0];
		}
    	else
    		return false;
    }
    //将session信息加密后存放在cookie中
    public function encode($data){
    	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$data = serialize($data);
		$crypttext =base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $data, MCRYPT_MODE_ECB, $iv));
		return $crypttext;

    }
    //解密cookie，将其还原成
    public function decode($data){
    	if(!($data)) return false;
    	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$this->key,base64_decode($data),MCRYPT_MODE_ECB,$iv);
		$decrypttext = unserialize($decrypttext);
		return $decrypttext;
    }


}

?>