<?php
	class template{
		public $tpl_var = array();
		public $obj;
		public $cacheTime = 240;
		private $isCache = 1;

		public function __construct(&$obj){
			$this->obj = $obj;
			$this->file = $this->obj->load('file');
			$this->op = $obj->load('operation');

		}

		public function compile_tpl($file_path){
			$content = file_get_contents($file_path);
			$content = $this->compileTree($content);
			//$content = $this->compileTvar($content);
			
			$content = $this->compileIf($content);
			$content = $this->compileInclude($content);
			$content = $this->compileArray($content);
			$content = $this->_compileTvar($content);
			
			

			//echo "$content";
			return $content;
		}
		public function _compileArray(&$str)
		{	
			

			$str = $this->_compileVar($str);
			$str = $this->_compileTvar($str);
			
			return $str;
		}

		public function _compileVar(&$str)
		{
			$limit = '/\$([\w|\']+)/';
			$replace = "'\$this->tpl_var[\'\${1}\']'";
			$str = preg_replace_callback($limit,function ($match){return ("\$this->tpl_var['$match[1]']");},$str);
			return $str;
		}

		public function _compileTvar($str)
		{	
			//echo $str."<br/>";
			$limit = '/v:([\w|\']+)/';
			$replace = "'\$\${1}'";
			$str = preg_replace_callback($limit,function ($match){
				 "\$$match[1]";
				return "\$$match[1]";},$str);

			return $str;
		}

		public function compileTvar(&$content)
		{	
			
			$limit = '/{cs4400;v:([\w|\']+)}/';
			$replace = "'<?php echo \$\${1}; ?>'";
			$content = preg_replace_callback($limit,function($match){
				return "<?php echo \$$match[1]; ?>";
			},$content);
			return $content;
		}
		
		public function compileTree(&$content){
			//{cs4400;tree: $a,$b,$c} will be replaced by $c=0; foreach($a as $key =>$b){$c++;}
			$limit = '/{cs4400;tree:([^,]+),(\w+),(\w+)}/';
			// [^,]+: matching everything except ^ and , one or more times
			// \w+ matching a-z, A-Z,0-9 and _ one or more times
			
			$content = preg_replace_callback($limit, function ($match){return "<?php \$$match[3] = -1;\n 
				foreach(".eval("return \$this->_compileArray(\$match[1]);")." as \$key => \$$match[2]){ 
					\$$match[3]++; ?>";}, $content);

			$limit = '/{cs4400;endtree}/';
			$content = preg_replace_callback($limit,function ($match){return "<?php } ?>";},$content);
			//return $content;
			return $content;

		}
		
		public function compileIf(&$content){
			$limit = '/{cs4400;if:([^}]+)}/';
			$replace = "'<?php if('.\$this->_compileArray('\${1}').'){ ?>'";
			$content = preg_replace_callback($limit,function ($match){return "<?php if(".eval("return \$this->_compileArray(\$match[1]);")."){ ?>";},$content);

			$limit = '/{cs4400;elseif:([^}]+)}/';
			$replace = "'<?php } elseif('.\$this->_compileArray('\${1}').'){ ?>'";
			$content = preg_replace_callback($limit,function ($match){return "<?php } elseif(".eval("return \$this->_compileArray(\$match[1]);")."){ ?>";},$content);

			$limit = '/{cs4400;else}/';
			$replace = "'<?php } else { ?>'";
			$content = preg_replace_callback($limit,function ($match){return "<?php } else { ?>";},$content);

			$limit = '/{cs4400;endif}/';
			$replace = "'<?php } ?>'";
			$content = preg_replace_callback($limit,function ($match){return "<?php } ?>";},$content);
			return $content;
		}
		public function compileInclude(&$content)
		{
			$limit = '/{cs4400;include:(\w+)}/';
			$replace = "'<?php \$this->_compileInclude(\'\${1}\'); ?>'";
			//$content = preg_replace($limit, $replace, $content);
			$content = preg_replace_callback($limit,function ($match){
				return "<?php \$this->_compileInclude('$match[1]'); ?>";},
				$content);
			return $content;
		}

		public function _compileInclude($file)
		{
			if($file)$this->fetch($file,NULL,0);
			if($this->isCache)include 'page/compile/cpl_'.$file.'.php';
		}

		public function compileArray(&$content)
		{
			$limit = '/{cs4400;([\$|v][\$|:|\[|\w|\]|\s|\']+)}/';
			$replace = "'<?php echo '.\$this->_compileArray('\${1}').'; ?>'";
			//$content = preg_replace($limit,$replace,$content);
			$content = preg_replace_callback($limit,function($match){
				return "<?php echo ".eval("return \$this->_compileArray(\$match[1]);")."; ?>";},$content);
			return $content;

		}
		public function compileConst(&$content)
		{
			$limit = '/{cs4400;c:(\w+)}/';
			$replace = "'<?php echo \${1}; ?>'";
			$content = preg_replace_callback($limit,function ($match){return "<?php echo $match[1]; ?>";},$content);
			return $content;
		}

		public function assign($target,$vars)
	    {
	    	if(is_array($vars))
	    	{
	    		foreach($vars as $key => $cnt)
	    		$this->tpl_var[$target][$key] = $vars[$key];
	    	}
	    	else
	    	{
	    		$this->tpl_var[$target] = $vars;
	    	}
	    }

	    

	    public function fetch($file){
	    	//半成品的php 文件
	    	$this->file->creat_cache_floder('page/compile/');
	    	//成品HTML文件
	    	$this->file->creat_cache_floder('page/html/');
	    	$source_file = 'tpl/'.$file.'.tpl';
	    	$output_file = 'page/compile/'.'cpl_'.$file.'.php';
	    	$content = $this->compile_tpl($source_file);
	    	$this->file->write_file($content,$output_file);
			$content = $this->compile_tpl($source_file);
	    	$output_cache = 'page/html/'.$file.'.html';

	    	$type =1;
	    	if((!file_exists($output_file)) || (filemtime($output_file) < filemtime($source_file)))
	    	{
				$content = $this->compile_tpl($source_file);
	    		$this->file->write_file($output_file,$content);
				if($type)
				{
					include $output_file;
					$this->fl->delFile($outcache);
				}
	    	}
	    	else
	    	{	

	    		if($this->isCache && (!file_exists($output_cache) || (time() - filemtime($output_cache)) > $this->cacheTime))
		    	{
					if($type)
		    		{	
				    	ob_start();
				    	
			    		include $output_file;
						$cachecontent = ob_get_contents();
						ob_flush();
						$this->file->write_file($cachecontent,$output_cache);
						ob_clean();
		    		}
		    	}
				else
				{
					include $output_file;
				}
	    	}
	    }

	    public function display($file)
	    {
	    	$this->fetch($file);
	    }



		
}
?>