<?php
interface isql{
	public function select();
	public function insert();
	public function delete();
	public function update();
}
class sql{
	 
	public function __construct(&$G){
	//	echo 'hello from sql class'."<br/>";
	}

	/*insert syntax:
	array(table, array('insert_col_name'=>'insert_col_value'))
*/	
	public function insert($args){
		if(!is_array($args)) return false;
		$table = $args[0];
		$field = $args[1];
		$col = array();
		$row = array();
		$value = array();
		if(is_array($args[1])){
			foreach ($args[1] as $key => $v) {
				# code...
				$col[] = $key;
				$row [] = ':'.$key;
				$value[$key] = $v;
			}
		}
		$col = implode(',',$col);
		$row = implode(',',$row);
		$sql = "insert into ".$table.' ('.$col.") ".'values ('.$row.')';
		$sql_array['sql'] = $sql;
		$sql_array['value'] = $value;
		return $sql_array;
	}

	/*
	$data = array(false,array('user','user_group'),array(array('AND',"user.username = :username",'username',$username),array('AND','user.usergroupid = user_group.groupid')));
	*/
	public function select($args){
		if(is_array($args[0]))
			$field = implode(',',$args[0]);
		else
			$field = $args[0];

		if(is_array($args[1])){
			$table = array();
			foreach ($args[1] as $key => $value) {
				$table[$key] = $value;
			}
			$table = implode(' ',$table);
		}
		else
			$table = $args[1];
		$query = array();
		$value = array();
		if(empty($args[2])||!is_array($args[2]))$query = 1;
		else
		{
			foreach ($args[2] as $key => $query_array) {
				# code...
				if($key ===0){
					$query[$key] = $query_array[1].' ';
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
				else{
					$query[$key] = $query_array[0].' '.$query_array[1].' ';
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
			}
			$query = implode(' ',$query);
		}
		
		if(isset($args[3])){
			if(is_array($args[3]))
				$group = implode(',',$args[3]);
			else
				$group = $args[3];
		}
		else
			$group = '';
		//if group is set, $group = GROUP BY $group
		//else $group = '';
		$group = $group?' GROUP BY '.$group:'';

		if(isset($args[4])){
			if(is_array($args[4]))
				$order = implode(' ',$args[4]);
			else
				$order = $args[4];
		}
		else
			$order = '';
		//if opder is set, $opder = ORDER BY $opder
		//else $opder = '';
		$order = $order?' ORDER BY '.$order:'';

		if(isset($args[5])){
			if(is_array($args[5]))
				$limit = implode(',',$args[5]);
			else
				$limit = $args[5];
		}
		else
			$limit = null;
		if(is_null($limit))
			$sql= 'select '.$field.' from '.$table.' where '.$query.$group.$order;
		else
			$sql = 'select '.$field.' from '.$table.' where '.$query.$group.$order.' limit '.$limit;
		$sql_array['sql'] = $sql;
		$sql_array['value'] = $value;
		return $sql_array;
	} 
	/*
	delete syntax: array(false,table.arrar(array('AND',condition1,condition2....)))
	*/
	public function delete($args){
		if(!is_array($args)) return false;
		$table = $args[0];
		if(!is_array($args[1]))$query = 1;
		else
		{
			$query = array();
			$value = array();
			foreach ($args[1] as $key => $query_array) {
				# code...
				if($key ===0){
					$query[$key] = $query_array[1].' ';				
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
				else{
					$query[$key] = $query_array[0].' '.$query_array[1].' ';
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
			}

			$query = implode(' ',$query);

		}
		
		if(isset($args[2])){
			if(is_array($args[2]))
				$group = implode(' ',$args[2]);
			else
				$group = $args[2];
		}
		else
			$group = '';
		//if group is set, $group = GROUP BY $group
		//else $group = '';
		$group = $group?' GROUP BY '.$group:'';

		if(isset($args[3])){
			if(is_array($args[3]))
				$order = implode(' ',$args[3]);
			else
				$order = $args[3];
		}
		else
			$order = '';
		//if opder is set, $opder = ORDER BY $opder
		//else $opder = '';
		$order = $order?' ORDER BY '.$order:'';

		if(isset($args[4])){
			if(is_array($args[4]))
				$limit = implode(' ',$args[4]);
			else
				$limit = $args[4];
		}
		else
			$limit = null;
		if(is_null($limit))
			$sql = 'delete from '.$table.' where '.$query.$group.$order;
		else
			$sql = 'delete from '.$table.' where '.$query.$group.$order.' limit '.$limit;
		$sql_array['sql'] = $sql;
		$sql_array['value'] = $value;
		return $sql_array;

	}

	/*
	$data = array('session',array('sessionrandcode'=>$randCode),array(array("AND","sessionid = :sessionid",'sessionid',$this->sessionid)));
	*/
	public function update($args){
		if(!is_array($args)) return false;
		$table = $args[0];
		$set =array();
		$value = array();
		foreach ($args[1] as $key => $v) {
			# code...
			$set[] = $key.' = :'.$key;
			$value[$key] =$v;
		}
		$set = implode(',',$set);
		$quert = array();

		if(!is_array($args[2]))$query = 1;
		else
		{
			$query = array();
			
			foreach ($args[2] as $key => $query_array) {
				# code...
				if($key ===0){
					$query[$key] = $query_array[1].' ';
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
				else{
					$query[$key] = $query_array[0].' '.$query_array[1].' ';
					if(isset($query_array[2]))
						$value [$query_array[2]] = $query_array[3];
				}
			}
			$query = implode('',$query);
		}
		if(isset($args[3])){
			if(is_array($args[3]))
				$group = implode(' ',$args[3]);
			else
				$group = $args[3];
		}
		else
			$group = '';
		//if group is set, $group = GROUP BY $group
		//else $group = '';
		$group = $group?' GROUP BY '.$group:'';

		if(isset($args[4])){
			if(is_array($args[4]))
				$order = implode(' ',$args[4]);
			else
				$order = $args[4];
		}
		else
			$order = '';
		//if opder is set, $opder = ORDER BY $opder
		//else $opder = '';
		$order = $order?' ORDER BY '.$order:'';

		if(isset($args[5])){
			if(is_array($args[5]))
				$limit = implode(' ',$args[5]);
			else
				$limit = $args[5];
		}
		else
			$limit = null;
		if(is_null($limit))
			$sql= 'update '.$table.' set '.$set.' where '.$query.$group.$order;
		else
			$sql = 'select '.$field.' from '.$table.' where '.$query.$group.$order.' limit '.$limit;
		$sql_array['sql'] = $sql;
		$sql_array['value'] = $value;
		return $sql_array;

	}


	public function makeSelect($args,$tablepre = NULL)
	{		
		
		//if($args[0] === false)$args[0] = '*';
		if(!$args[0])$args[0] = '*';
		$db_fields = is_array($args[0])?implode(',',$args[0]):$args[0];
		$tables = $args[1];
		if(is_array($tables))
		{
			$db_tables = array();
			foreach($tables as $p)
			{
				$db_tables[] = "{$tb_pre}{$p} AS $p";
			}
			$db_tables = implode(',',$db_tables);
		}
		else
		$db_tables = $tb_pre.$tables;
		$query = $args[2];
		if(!is_array($query) || empty($query))$db_query = 1;
		else
		{
			$q = array();
			$v = array();
			foreach($query as $key => $p)
			{
				if($key)
				{
					$q[] = $p[0].' '.$p[1].' ';
					if(isset($p[2]))
					$v[$p[2]] = $p[3];
				}
				else
				{
					$q[] = $p[1].' ';
					if(isset($p[2]))
					$v[$p[2]] = $p[3];
				}
			}
			$db_query = ' '.implode(' ',$q);
		}
		if(isset($args[3]))
		$db_groups = is_array($args[3])?implode(',',$args[3]):$args[3];
		else
		$db_groups = '';
		if(isset($args[4]))
		$db_orders = is_array($args[4])?implode(',',$args[4]):$args[4];
		else
		$db_orders = '';
		if(isset($args[5]))
		$db_limits = is_array($args[5])?implode(',',$args[5]):$args[5];
		else
		$db_limits = '';
		
		$db_groups = $db_groups?' GROUP BY '.$db_groups:'';
		$db_orders = $db_orders?' ORDER BY '.$db_orders:'';
		if($db_limits === false)
		$sql = 'SELECT '.$db_fields.' FROM '.$db_tables.' WHERE '.$db_query.$db_groups.$db_orders;
		else
		$sql = 'SELECT '.$db_fields.' FROM '.$db_tables.' WHERE '.$db_query.$db_groups.$db_orders.' LIMIT '.$db_limits;
		return array('sql' => $sql, 'v' => $v);
	}
}

?>