<?php
	class file{

		public function __construct(){

		}

		public function creat_cache_floder($path){
	    	if(!file_exists($path)){
	    		$this->creat_cache_floder(dirname($path));
	    		mkdir($path,0755);
	    	}

	    }

	    public function write_file($content,$out_path){

	    	//$out_path has the formation aaa/bbb/ccc/ddd.php
	    	//check if the out_path is existing
	    	$a = dirname($out_path);
	    	if(!$a)
	    		//if not, creat aaa/bbb/ccc
	    		$this->creat_cache_floder($a);
	    	$fp = fopen($out_path,'w');
	    	//lock the file while writing
	    	flock($fp, LOCK_EX);
    		$b= fwrite($fp, $content);
    		//release the locker when finish writing
    		fclose($fp);
	    }
	    public function delFile($file)
	    {
	    	if(file_exists($file))unlink($file);
	    }


	}
?>