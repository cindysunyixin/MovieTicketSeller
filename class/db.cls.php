<?php

 class db
 {
 	public $G;
 	private $queryid = 0;
	private $linkid = 0;

    public function __construct(&$G)
    {
    	
    	$this->sql = $G->load('sql');
    }

    public function connect($host = DH,$dbuser = DU,$password = DP,$dbname = DB,$dbcode = HE)
    {
    	$dsn="mysql:host=".DH.";dbname=".DB.";";
    	
    	$this->linkid = new PDO($dsn,DU,DP);
   
    	$this->linkid->query("set names utf8");
    }

   
    public function fetchAll($sql,$index=false,$unserialize = false)
    {
    	if(!is_array($sql))return false;
    	if(!$this->linkid)$this->connect();
    	$query = $this->linkid->prepare($sql['sql']);
    	$rs = $query->execute($sql['value']);
		if ($rs) {
			$query->setFetchMode(PDO::FETCH_ASSOC);
			//return $query->fetchAll();
			$r = array();
			while($tmp = $query->fetch())
			{
				if($unserialize)
				{
					if(is_array($unserialize))
					{
						foreach($unserialize as $value)
						{
							$tmp[$value] = unserialize($tmp[$value]);
						}
					}
					else $tmp[$unserialize] = unserialize($tmp[$unserialize]);
				}
				if($index)
				{
					$r[$tmp[$index]] = $tmp;
				}
				else
				$r[] = $tmp;
			}
			return $r;
		}
		else
			return false;
    }

    public function fetch($sql,$unserialize = false)
    {	    	
    	if(!is_array($sql))return false;
    	if(!$this->linkid) $this->connect();
    	$query = $this->linkid->prepare($sql['sql']);
    	$rs = $query->execute($sql['value']);//return true or false

    	if ($rs) {
			//set to associative mode
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$tmp = $query->fetch();	
			if($tmp)
	    	{
		    	if($unserialize)
				{
					if(is_array($unserialize))
					{
						foreach($unserialize as $value)
						{
							$tmp[$value] = unserialize($tmp[$value]);
							//print_r($tmp[$value]);
						}
					}
					else $tmp[$unserialize] = unserialize($tmp[$unserialize]);
				}
	    	}
	    	//print_r($tmp['examsessionquestion']);
			return $tmp;
		}
		else
		return false;
    }

    public function query($sql)
    {
    	if(!$sql)return false;
    	if(!$this->linkid)$this->connect();
    	return $this->linkid->query($sql);
    }
    //return affeteced rows
    public function exec($sql)
    {
    	$this->affectedRows = 0;
    	if(!is_array($sql))return false;
    	if(!$this->linkid)$this->connect();
    	
    	$query = $this->linkid->prepare($sql['sql']);
    	$rs = $query->execute($sql['value']);
		$this->affectedRows = $rs;
    	return $rs;
    }

	public function affectedRows()
	{
		return $this->affectedRows;
	}
 }
?>
