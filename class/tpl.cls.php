<?php

class tpl
{

	public $tpl_var = array();
	private $isCache = 1;
	private $cacheTime = 300;

	public $G;
	public $dir;
	public $cacheDir;

	public function __construct(&$G)
    {
    	$this->G = $G;

    	//$this->fl = $this->G->make('files');
    	//$this->ev = $this->G->make('ev');

    	//if($this->ev->url(1))
    	//$this->dir = $this->G->app.'/tpls/'.$this->ev->url(1).'/';
    	//else $this->dir = $this->G->app.'/tpls/app/';
    }

   
	//赋值变量
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

	//初始化模板文件地址
	public function initFile()
	{
		$this->fl->mdir('data/html/'.$this->dir);
		$this->fl->mdir('data/compile/'.$this->dir);
	}

	//读取模板
	public function readTpl($file_path = "tpl/test.tpl")
	{
		if(file_exists($file))return file_get_contents($file_path);
		else
		die('The template not fount which name is '.$file);
	}

	//判断字符值是否存在，并返回指定类型的值
	
	

	//编译模板
	public function compileTpl($source)
	{
		$content = $this->readTpl($source);
		
		//$this->compileTree($content);
		
		//$this->compileEval($content);
		//$this->compileSql($content);
		//$this->compileIf($content);
		//$this->compileInclude($content);
		$this->compileArray($content);
		//$this->compileSubstring($content);
		//$this->compileRealVar($content);
		//$this->compileEnter($content);
		//$this->compileConst($content);
		return $content;
	}

	public function compileContentTpl($content)
	{
		
		//$this->compileTree($content);
		
		//$this->compileIf($content);
		//$this->compileInclude($content);
		$this->compileArray($content);
		return $content;
	}

	public function compileInclude(&$content)
	{
		$limit = '/{x2;include:(\w+)}/';
		$replace = "'<?php \$this->_compileInclude(\'\${1}\'); ?>'";
		//$content = preg_replace($limit, $replace, $content);
		$content = preg_replace_callback($limit,function ($match){
			return "<?php \$this->_compileInclude('$match[1]'); ?>";},
			$content);
	}

	public function _compileInclude($file)
	{
		if($file)$this->fetch($file,NULL,0);
		if($this->isCache)include 'data/compile/'.$this->dir.'/%%cpl%%'.$file.'.php';
	}

	public function compileRealVar(&$content)
	{
		$limit = '/{x2;realhtml:([^}]+)}/';
		/*原本是这样的，但是这样会导致排版错位
		$replace = "'<?php echo html_entity_decode(\\\$this->ev->stripSlashes('.\$this->_compileArray('\${1}').')); ?>'";
		*/
		$replace = "'<?php echo html_entity_decode(\\\$this->ev->showQuestion('.\$this->_compileArray('\${1}').')); ?>'";
		//$content = preg_replace($limit, $replace, $content);
		$content = preg_replace_callback($limit,function ($match){
			return "<?php echo html_entity_decode(\$this->ev->showQuestion(".eval("return \$this->_compileArray(\$match[1]);").")); ?>";
		},
		$content);
	}

	public function compileVar(&$content)
	{
		$limit = '/{x2;\$(\w+)}/';
		$replace = "'<?php echo \$this->tpl_var[\'\${1}\']; ?>'";
		$content = preg_replace_callback($limit,function ($match){
			return "<?php echo ".eval("return \$this->tpl_var[\$match[1]];")." ?>";
		},$content);
	}

	public function _compileVar($str)
	{
		$limit = '/\$([\w|\']+)/';
		$replace = "'\$this->tpl_var[\'\${1}\']'";
		$str = preg_replace_callback($limit,function ($match){return ("\$this->tpl_var['$match[1]']");},$str);
		return $str;
	}

	public function compileTvar(&$content)
	{
		$limit = '/{x2;v:([\w|\']+)}/';
		$replace = "'<?php echo \$\${1}; ?>'";
		$content = preg_replace_callback($limit,function($match){
			return "<?php echo \$$match[1]; ?>";
		},$content);
	}

	public function _compileTvar($str)
	{
		$limit = '/v:([\w|\']+)/';
		$replace = "'\$\${1}'";
		$str = preg_replace_callback($limit,function ($match){
			return "\$$match[1]";},$str);
		return $str;
	}

	public function compileConst(&$content)
	{
		$limit = '/{x2;c:(\w+)}/';
		$replace = "'<?php echo \${1}; ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php echo $match[1]; ?>";},$content);
	}

	public function compileArray(&$content)
	{
		$limit = '/{x2;([\$|v][\$|:|\[|\w|\]|\s|\']+)}/';
		$replace = "'<?php echo '.\$this->_compileArray('\${1}').'; ?>'";
		//$content = preg_replace($limit,$replace,$content);
		$content = preg_replace_callback($limit,function($match){
			return "<?php echo ".eval("return \$this->_compileArray(\$match[1]);")."; ?>";},$content);

	}

	public function _compileArray($str)
	{
		$str = $this->_compileVar($str);
		$str = $this->_compileTvar($str);
		return $str;
	}

	public function compileDate(&$content)
	{
		$limit = '/{x2;date:([^,]+),([^}]+)}/';
		$replace = "'<?php echo date(\${2},'.\$this->_compileArray('\${1}').'); ?>'";
		$content = preg_replace_callback($limit,function($match){return "<?php echo date($match[2],".eval("return \$this->_compileArray(\$match[1]);")."); ?>";},$content);
	}

	public function compileSubstring(&$content)
	{
		$limit = '/{x2;substring:([^,]+),([^}]+)}/';
		$replace = "'<?php echo \\\$this->G->make(\'strings\')->subString('.\$this->_compileArray('\${1}').',\${2}); ?>'";
		//$content = preg_replace($limit,$replace,$content);
		$content = preg_replace_callback($limit,function ($match){
			return "<?php echo \$this->G->make('strings')->subString(".eval("return \$this->_compileArray(\$match[1]);").",$match[2]); ?>";},$content);
	}

	public function compileRealSubstring(&$content)
	{
		$limit = '/{x2;realsubstring:([^,]+),([^}]+)}/';
		$replace = "'<?php echo \\\$this->G->make(\'strings\')->subString(strip_tags(html_entity_decode(\\\$this->ev->stripSlashes('.\$this->_compileArray('\${1}').'))),\${2}); ?>'";
		//$content = preg_replace($limit,$replace,$content);
		$content = preg_replace_callback($limit,function ($match){
			return "<?php echo \$this->G->make('strings')->subString(strip_tags(html_entity_decode(\$this->ev->stripSlashes(".eval("return \$this->_compileArray(\$match[1]);").")),\$match[2]); ?>";
		},$content);
	}

	public function compileEval(&$content)
	{
		$limit = '/{x2;eval:([^}]+)}/';
		$replace = "'<?php '.\$this->_compileArray(\\\$this->ev->stripSlashes('\${1}')).'; ?>'";
		//$content = preg_replace($limit,$replace,$content);
		$content = preg_replace_callback($limit,function ($match){
			return "<?php ".eval("return \$this->_compileArray(\$this->ev->stripSlashes(\$match[1]));")." ?>";
		},$content);
	}

	public function compileSql(&$content)
	{
		$limit = '/{x2;sql:"([^"]+)",([a-z]+)}/';
		$replace = "'<?php \$\${2}=\\\$this->G->make(\'pepdo\')->fetchAll(array(\"sql\"=>\"'.\$this->_compileArray('\${1}').'\")); ?>'";
		//这里可能有问题
		$content = preg_replace_callback($limit,function ($match){
			return "<?php \$$match[2]=\$this->G->make('pepdo')->fetchAll(array(\"sql\"=>
				\".".eval("return \$this->_compileArray(\$match[1]);").".\")); ?>";
		},$content);
	}

	public function compileIf(&$content)
	{
		/*
		$limit = '/{x2;if:\$([^}]+)}/';
		$replace = "'<?php if(\${1})'.'){ ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php if(".eval("return \$match[1];")."){ ?>";},$content);
		*/

		$limit = '/{x2;if:([^}]+)}/';
		$replace = "'<?php if('.\$this->_compileArray('\${1}').'){ ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php if(".eval("return \$this->_compileArray(\$match[1]);")."){ ?>";},$content);

		$limit = '/{x2;elseif:([^}]+)}/';
		$replace = "'<?php } elseif('.\$this->_compileArray('\${1}').'){ ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php } elseif(".eval("return \$this->_compileArray(\$match[1]);")."){ ?>";},$content);

		$limit = '/{x2;else}/';
		$replace = "'<?php } else { ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php } else { ?>";},$content);

		$limit = '/{x2;endif}/';
		$replace = "'<?php } ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php } ?>";},$content);
	}

	public function compileLoop(&$content)
	{
		$limit = '/{x2;loop:([^,]+),(\w+),*(\d*),*(\d*),*(\d*)}/';
		$replace = "'<?php \n\$'.\${2}.'All = count('.\$this->_compileArray('\${1}').');\nfor(\$\${2}= '.\$this->reBool('\${3}').';\$\${2}<\$\${2}All;\$\${2}+='.\$this->reBool('\${5}',1).')\n{\nif('.\$this->reBool('\${4}').' && \$\${2}>='.\$this->reBool('\${4}').')break;\n?>'";
		$content = preg_replace_callback($limit,function ($match){
			return "<?php \n\$$match[2]All = count("
				.eval("return \$this->_compileArray(\$match[1]);").");\n
				for(\$$match[2]= ".
					eval("return \$this->reBool(\$match[3]);").";
					\$$match[2]<\$$match[2]All;\$$match[2]+=".
						eval("return \$this->reBool(\$match[5],1);").")\n
				{\n
					if(".
						eval("return \$this->reBool(\$match[4]);")." && \$$match[2]>=".eval("return \$this->reBool(\$match[4]);").")break;\n?>";
		},$content);

		$limit = '/{x2;endloop}/';
		$replace = "'<?php } ?>'";
		$content = preg_replace_callback($limit,function( $match){return "<?php } ?>";},$content);
	}

	public function compileTree(&$content)
	{
		$limit = '/{x2;tree:([^,]+),(\w+),(\w+)}/';
		$replace = "'<?php \$\${3} = 0;\n foreach('.\$this->_compileArray('\${1}').' as \$key => \$\${2}){ \n \$\${3}++; ?>'";
		$content = preg_replace_callback($limit, function ($match){return "<?php \$$match[3] = 0;\n 
			foreach(".eval("return \$this->_compileArray(\$match[1]);")." as \$key => \$$match[2]){ 
				\$$match[3]++; ?>";}, $content);

		$limit = '/{x2;endtree}/';
		$replace = "'<?php } ?>'";
		$content = preg_replace_callback($limit,function ($match){return "<?php } ?>";},$content);
	}

	public function compileBlock(&$content)
	{
		$limit = '/{x2;block:(\d+)}/';
		$replace = "'<?php echo \$this->exeBlock(\'$1\'); ?>'\n";
		$content = preg_replace_callback($limit,function ($match){return "<?php echo ".eval("return \$this->exeBlock(\$match[1]);")."; ?>\n";},$content);
	}

	public function compileEnter(&$content)
	{
		$limit = '/{x2;enter}/';
		$replace = "'<?php echo \"\n\"; ?>'\n";
		$content = preg_replace_callback($limit,function ($match){return "<?php echo \"\n\"; ?>\n";},$content);
	}

	public function compileCode(&$content)
	{
		$limit = '/{x2;code:(.+)}/';
		$replace = "'<?php '.'\$this->_compileArray('\${1}').'; ?>'\n";
		$content = preg_replace_callback($limit,function ($match){return "<?php ".eval("return \$this->_compileArray(\$match[1]);")."; ?>\n";},$content);
	}

	//解析模板
	public function fetch($file,$par='',$type = 0,$cachename = NULL)
    {
    	$this->initFile();
    	$source = 'tpl/test.tpl';
    	$outfile = 'data/compile/'.'%%cpl%%'.$file.'.php';
    	$content = $this->compileTpl($source);
			
    	$this->fl->writeFile($outfile,$content);
		if($cachename)$outcache = 'data/html/'.$cachename.'.html';
		else
    	$outcache = 'data/html/'.$file.$par.'.html';
    	if((!file_exists($outfile)) || (filemtime($outfile) < filemtime($source)))
    	{
			$content = $this->compileTpl($source);
    		$this->writeFile($outfile,$content);
			if($type)
			{
				include $outfile;
				$this->fl->delFile($outcache);
			}
    	}
    	else
    	{
    		if($this->isCache && (!file_exists($outcache) || (time() - filemtime($outcache)) > $this->cacheTime))
	    	{
				if($type)
	    		{
			    	ob_start();
		    		include $outfile;
					$cachecontent = ob_get_contents();
					ob_flush();
					$this->fl->writeFile($outcache,$cachecontent);
					ob_clean();
	    		}
	    	}
			else
			{
				include $outfile;
			}
    	}
    }

    public function fetchContent($content)
    {
    	return $this->compileContentTpl($content);
    }

    public function fetchExeCnt($file)
    {
    	$source = 'app/'.$this->dir.$file.'.tpl';
    	$content = $this->compileTpl($source);
    	ob_start();
    	eval(' ?>'.$source.'<?php ');
    	$cachecontent = ob_get_contents();
    	ob_flush();
    	ob_clean();
    	return $cachecontent;
    }

    //展示模板
    public function display($file,$par=NULL,$cachename = NULL)
    {
    	$this->fetch($file,$par,1,$cachename);
    }

    public function writeFile($out,$content='')
    {
		$t = dirname($out);
		if(!is_dir($t))
		$this->mdir($t);
		$fp = fopen($out,'w');
		flock($fp, LOCK_EX);
		$wp = fwrite($fp,$content);
		flock($fp, LOCK_UN);
		fclose($fp);
    }
}

?>