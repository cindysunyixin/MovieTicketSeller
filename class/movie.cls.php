<?php

class movie{

	public function __construct(&$G){
		$this->session = $G->load('session');
		$this->user = $G->load('customer');
		$this->tmpl = $G->load('template');
		$this->op = $G->load('operation');
		$this->sql = $G->load('sql');
		$this->db = $G->load('db');
	}


	public function movieList(){
		if(isset($_SESSION['movie_list'])&&$_SESSION['movie_list']!='') $movie_list=$_SESSION['movie_list'];
		$sql['sql'] = "select * from movie where 1 limit 100";
		$sql['value'] = array();
		$movie_list = $this->db->fetchAll($sql,'name',false);
		
		if($movie_list){
			foreach ($movie_list as $key => $value) {
				if(strtotime($value['release_data']) <= time()){
					$movie_list[$key]['status'] = 1;
					if(strtotime($movie_list[$key]['avai_until']) >=time())
						$movie_list[$key]['isplaying'] = 1;
					else
						$movie_list[$key]['isplaying'] = 0;
				}
				else{
					$movie_list[$key]['status'] = 0;
					$movie_list[$key]['isplaying'] = 0;
				}
			}
		}
		$_SESSION['movie_list']=$movie_list;
		//$this->op->test($_SESSION['movie_list']);
		
		return $movie_list;
	}
	public function update_movie_list(){
		$data = array('*','movie',array(array('and','status =:movie_status','movie_status',1)));
		$sql = $this->sql->select($data);
		$movie_list = $this->db->fetchAll($sql,'name',false);
		$_SESSION['movie_list']=$movie_list;
	}

	public function now_playing(){
		$data = array('*','movie',array(array('and','avai_until >=:d','d',date('Y-m-d')),array('and','release_data<=:da','da',date('Y-m-d'))));
		$sql = $this->sql->select($data);
		$movie_list = $this->db->fetchAll($sql,'name',false);
		if($movie_list){
			foreach ($movie_list as $key => $value) {
					$movie_list[$key]['status'] = 1;
			}
		}
		return $movie_list;
		

	}
	public function coming_soon(){
		$sql['sql'] = "select * from movie where release_data >=:d";
		$sql['value'] = array('d'=>date('Y-m-d'));
		$a = $this->db->fetchAll($sql,'name',false);
		if($a){
			foreach ($a as $key => $value) {
					$a[$key]['status'] = 0;
			}
		}
		return $a;
	}

	public function not_avai(){
		$sql['sql'] = "select * from movie where avai_until <:d";
		$sql['value'] = array('d'=>date('Y-m-d'));
		$a = $this->db->fetchAll($sql,'name',false);
		if($a){
			foreach ($a as $key => $value) {
					$a[$key]['status'] = 1;
			}
		}
		return $a;
	}

	public function addMovie($args){
		if(!is_array($args)) return false;
		//$args['release_data'] = date_create($args['release_data'])->format('Y-m-d');
		$data = array('movie',$args);
		$sql = $this->sql->insert($data);
		$a = $this->db->exec($sql);
		//$this->op->test($sql);
		$_SESSION['movie_list'][$args['name']] = $args;
		//$this->update_movie_list();
		return $a;
	}

	public function getMovieInfo($movie_name){
		//movie name is unique
		$data = array('*','movie',array(array('and','name =:movie_name','movie_name',$movie_name)));
		$sql = $this->sql->select($data);
		return $this->db->fetch($sql);

	}

	public function overview($movie_name){
		$data = array('*','movie_overview',array(array('and','name =:movie_name','movie_name',$movie_name)));
		$sql = $this->sql->select($data);
		return $this->db->fetch($sql);

	}

	public function updata_movie_info($args){
		$name = $args['movie_name'];
		$movie = $this->getMovieInfo($name);
		$num_of_rating = $movie['num_of_rating'];
		$rating_ave = ($movie['rating']*$num_of_rating + $args['rating'])/($num_of_rating+1);
		$rating_ave = number_format($rating_ave,2);
		$num_of_rating = $num_of_rating+1;
		$data = array('movie',array('rating' => $rating_ave, 'num_of_rating'=> $num_of_rating),array(array("AND","name =:n",'n',$name)));
		$sql = $this->sql->update($data);
		$rs = $this->db->exec($sql);
		if($rs){
			$_SESSION['movie_list'][$name]['num_of_rating'] = $num_of_rating;
			$_SESSION['movie_list'][$name]['rating'] = $rating_ave;
			$_SESSION['select_movie']['num_of_rating'] = $num_of_rating;
			$_SESSION['select_movie']['rating'] = $rating_ave;
		}
		
	} 
	
}

?>
