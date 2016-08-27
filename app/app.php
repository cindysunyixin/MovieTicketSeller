<?php
class app{
	private $islogin = false;
	public $randcode;
	public function __construct(&$G){
		//print_r($G);
		$this->session = $G->load('session');
		$this->user = $G->load('customer');

		$this->tmpl = $G->load('template');
		$this->op = $G->load('operation');
		$this->sql = $G->load('sql');
		$this->db = $G->load('db');
		$this->movie = $G->load('movie');
		$this->ticket = $G->load('ticket');
		$this->aboutme = $G->load('about_me');
		$this->default_groupid=1;
		//$this->price = $this->ticket->price();
		//exit();
		$this->user_data = $this->session->getSession();
		
		//$this->op->test($_SESSION);
		//$this->op->test($this->user_data);
		//exit();
		$discount_s = $this->ticket->discount('senior_discount')['senior_discount'];
		$discount_c = $this->ticket->discount('child_discount')['child_discount'];
		
		if(time()-$this->user_data['sessionmodifytime']>3600 || $this->user_data['sessionstatus']!=1){
			header('location:index.php?user-login');
			exit();
		}
	}
	public function index(){
		//$this->op->test($_SESSION);
		$this->movie_list();
	}
	
	//获取movie list
	public function movie_list(){
		if(isset($_SESSION['movie_list'])&&$_SESSION['movie_list']!='') $movie_list=$_SESSION['movie_list'];
		else
			$movie_list = $this->movie->movieList();
		//$this->op->swal('aaa','bbb','warning','index.php?app-index',1500)
		//
		$now_playing = $this->movie->now_playing();
		$coming_soon = $this->movie->coming_soon(); 
		$not_avai = $this->movie->not_avai(); 
		//$this->op->test($coming_soon);
		//$this->op->test($_SESSION['movie_list']);
		$this->tmpl->assign('movie_list',$now_playing);
		$this->tmpl->assign('coming_soon',$coming_soon);
		$this->tmpl->assign('not_avai',$not_avai);
		$this->tmpl->display('now_playing');
	}
	//更具movie name获取movie的其他信息
	public function movie_info(){
		$movie_name = $this->op->get('movie_name');
		if(!isset($_SESSION['movie_list'])){
			$move_info = $this->movie->getMovieInfo($movie_name);
			if(strtotime($move_info['release_data']) >time()){
			 	$move_info['status']=0;
			 }
			else $move_info['status']=1;
			$_SESSION['select_movie'] = $move_info;
		}
		else{
			$_SESSION['select_movie'] = $_SESSION['movie_list'][$movie_name];
		}
		//$_SESSION['select_movie']
		$view_review = 1;
		if(strtotime($_SESSION['select_movie']['release_data']) > time())
			$view_review = 0;
		$this->tmpl->assign('review',$view_review);
		$this->tmpl->assign('movie_info',$_SESSION['select_movie']);
		$this->tmpl->display('movie_info');
	}
	//
	public function aboutme(){
		$this->tmpl->display('about_me');
	}
	//添加一个新的movie--manager或者admin才可以添加，暂时放这里方便测试
	public function addmovie(){
		
		if($this->op->get('add')){
			$args=$this->op->get('args');
			$theater = $this->op->get('theater');
			$schedule = $this->op->get('schedule');
			$price=$this->op->get('price');
			$args['release_data'] = date_create($args['release_data'])->format('Y-m-d');
			$a = $this->movie->addMovie($args);
			//$this->op->test($theater);
			$b = $this->ticket->addmovie_theater($_SESSION['theater_list'][$theater['index']],$args['name']);
			$movie_schedule['movie_name'] = $args['name'];
			$movie_schedule['theater_name'] = $theater['name'];
			$movie_schedule['movie_time'] = $schedule;
			$movie_schedule['date'] = $args['release_data'];
			$movie_schedule['ava_until'] = $args['release_data'];
			$movie_schedule ['ticket_price'] =$price;
			$movie_schedule ['same_schedule'] =1;
			$c = $this->ticket->addmovie_schedule($movie_schedule);
			if($a&&$b&&$c){
				unset($_SESSION['theater_list']);
				header("location:index.php?app-movie_list");
				//$this->op->swal('success','addmovie_schedule','success');
				exit;
			}
			

		}
		else{
			$theater_list = $this->ticket->get_theater();
			$_SESSION['theater_list'] = $theater_list;
			$this->movie->movieList();
			$this->tmpl->assign('theater',$theater_list);
			$this->tmpl->display('addmovie');
		}
	}
	//获取特定影片的overview
	public function overview(){
		if(isset($_SESSION['select_movie'])) 
			$movie_name=$_SESSION['select_movie']['name'];
		else
			$movie_name=$this->op->get('movie_name');
		$overview = $this->movie->overview($movie_name);
		$overview['cast'] =explode(',', $overview['cast']);
		$this->tmpl->assign('name',$movie_name);
		$this->tmpl->assign('overview',$overview);
		$this->tmpl->display('movie_overview');
	}

	public function review(){
		if($this->op->get('s')) $s =1;//successfully give a review
		else $s=0;
		//first check if the custmer has ordered a ticket of this movie
		if(isset($_SESSION['select_movie'])) 
			$movie_name=$_SESSION['select_movie']['name'];
		else
			$movie_name=$this->op->get('movie_name');
		$move_info = $this->movie->getMovieInfo($movie_name);
		//show comments
		$data = array("*",'review',array(array('and','movie_name =:movie_name','movie_name',$movie_name)),false,'id DESC','5');
		$sql = $this->sql->select($data);		
		$review = $this->db->fetchAll($sql);

		if(strtotime($_SESSION['select_movie']['release_data']) > time())
			$complete_order = 0;
		else
			$complete_order = $this->ticket->complete_order($movie_name);
		$this->tmpl->assign('complete_order',$complete_order);

		$this->tmpl->assign('s',$s);
		$this->tmpl->assign('average_rating',$_SESSION['movie_list'][$movie_name]['rating']);
		$this->tmpl->assign('movie',$_SESSION['select_movie']);
		$this->tmpl->assign('review',$review);
		$this->tmpl->display('view_review');
	}
	public function give_review(){
		$give_review = $this->op->get('give_review');
		$args = $this->op->get('args');
		//$this->op->test($args);
		
		if($give_review && !empty($args['title'])){
			$args['user_name'] = $_SESSION['user']['username'];
			$args['movie_name'] = $_SESSION['select_movie']['name'];
			$data = array('review',$args);
			$sql = $this->sql->insert($data);
			$rs = $this->db->exec($sql);
			if($rs){
				$this->movie->updata_movie_info($args);

				header("location:index.php?app-review&s=1");
				exit;
			}
			//exit();
		}
		elseif($give_review){
			$this->op->swal('title can not be empty','','error');
		}
		$this->tmpl->assign('movie',$_SESSION['select_movie']);
		$this->tmpl->display('give_review');
	}

	public function choosetheater(){
		//洲名和城市名字一样的，比如说new york， 如果不在名字后面加 city，则统统认为是洲，城市名必须加city。
		//https://en.wikipedia.org/wiki/List_of_U.S._cities_named_after_their_state
		$choose= $this->op->get('choose_theater');
		$search= $this->op->get('search_theater');
		if($choose){
			$name = $this->op->get('theater_name');
			$selected_theater = $this->ticket->get_prefer_theater_by_name($name);

			$_SESSION['selected_theater'] = $selected_theater;
			header("location:index.php?app-select_time");
			exit;			
			//$_SESSION['preferredTheater']=$preferredTheater;
		}
		elseif($search){			
			$search_info = $this->op->get('search_info');
// can only search theater that has this movie
			$result = $this->ticket->search_theater($search_info,$_SESSION['select_movie']['name']);			
			$this->search_result($result);
		}
		else{
			$preferredTheater = $this->ticket->get_prefered_theater();
			$this->tmpl->assign('saved_theater',$preferredTheater);
			$this->tmpl->display('chooseTheater');
		}
	}

	public function search_result($result=null){
		$next = $this->op->get('next');
		$save = $this->op->get('save');
		if($next){
			$theater_name = $this->op->get('selected_theater');
			 $a= $this->ticket->get_theater_by_name($theater_name);
			 $_SESSION['selected_theater'] = $a;
			 if($save){
				$this->ticket->save_theater($_SESSION['selected_theater']);
			 }
			 //$this->select_time();
			 header("location:index.php?app-select_time");
			 exit;
		}
		$this->tmpl->assign('result',$result);
		$this->tmpl->display('search_result');
	}
	public function select_time(){
		$date = $this->op->get('date');
		$movie_name = $_SESSION['select_movie']['name'];
		$theater_name = $_SESSION['selected_theater']['name'];
		$sql['sql'] = "select * from movie_time where movie_name =:m_name and theater_name =:t_name ";
		$sql['value']=array('m_name'=>$movie_name,'t_name'=>$theater_name);
		$a = $this->db->fetch($sql);
		if(!$a){
			$this->op->swal("This movie is not aviailable in this theater");
		}
		$price = $a['ticket_price'];
		if($date){
			$ticket['movie_name'] = $movie_name;
			$ticket['theater_name'] = $theater_name;
			$ticket['theater_address'] = $_SESSION['selected_theater']['address'];
			$ticket['level'] = $_SESSION['select_movie']['level'];
			$ticket['duration'] = $_SESSION['select_movie']['duration'];			
			$ticket['date'] = date('Y-m-d',strtotime($date));
			$time = $this->op->get('time');
			$ticket['time'] = $time;
			$ticket['price'] = $price;
			$ticket['date_with_time'] = date('Y-m-d',strtotime($date)).' '.date('H:i:s',strtotime($time));
			$_SESSION['ticket'] = $ticket;
			header("location:index.php?app-buyticket");
			exit;
		}
		//echo DATE("Y-m-d");
		$current_date = date_create(DATE('Y-m-d'));
		$max_date = date_create(DATE('Y-m-d'));
		$available_until = date_create($_SESSION['select_movie']['avai_until']);
		$interval = date_diff($current_date, $available_until);
		if($interval->format('%a')<7) {
			$interval = new DateInterval('P'.$interval->format('%a').'D');
		}
		else{
			$interval = new DateInterval('P7D');
		}
		//var_dump($interval);
		$max_date->add($interval);
		
		$this->tmpl->assign('current_date',$current_date->format('Y-m-d'));
		$this->tmpl->assign('max_date',$max_date->format('Y-m-d'));
		$this->tmpl->assign('theater_name',$theater_name);
		$this->tmpl->assign('select_movie',$_SESSION['select_movie']);
		$this->tmpl->display('select_time');
		
	}
	public function movie_time(){
		$date = $this->op->get('date');
		$movie_name = $_SESSION['select_movie']['name'];
		$theater_name = $_SESSION['selected_theater']['name'];
		$sql['sql'] = "select movie_time,same_schedule from movie_time where movie_name =:m_name and theater_name =:t_name";
		$sql['value'] = array('m_name'=>$movie_name,'t_name'=>$theater_name);
		$res = $this->db->fetch($sql);
		if(!$res['same_schedule']){
			$sql['sql'] = "select movie_time from movie_time where movie_name =:m_name and theater_name =:t_name and date =:m_date";
			$sql['value'] = array('m_name'=>$movie_name,'t_name'=>$theater_name,'m_date'=>$date);
			$res = $this->db->fetch($sql);
		}
		$a = explode(',', strtoupper($res['movie_time']));
		if($date == DATE('Y-m-d')){
			$counter = 0;
			for($i=0;$i<count($a);$i++){
				if(strtotime($a[$i])>time()){
					$movie_time[$counter] = $a[$i];
					$counter ++;
				}
			}
		}
		else $movie_time = $a;
		if($res){
			for($i=0;$i<count($movie_time);$i++){
				//print_r($movie_time[$i]);
				echo "<input type='radio' name='time' value = ".$movie_time[$i]." onclick='showbutton(this.value)'> $movie_time[$i]";
				echo "&nbsp &nbsp &nbsp";
			}
			echo "</br>";
			echo "<button type='submit' style='display:none; margin-top:10px;' id='sub'> submit </button>";
		}
		echo "</form>";
		echo "</div>";
	}

	public function buyticket(){		
		if($this->op->get('next')){
			$adult = $this->op->get('adult');
			$child = $this->op->get('child');
			$senior = $this->op->get('senior');
			if(!$adult && !$child && !$senior){
				$this->op->swal('No ticket is selected','','error','index.php?app-buyticket');
				exit();
				}
			$num_of_ticket = "Adult: ".$adult.", Child: ".$child.", Senior: ".$senior;
			$price = $_SESSION['ticket']['price'];
			if(!$discount_s) $discount_s = 0.8;
			if(!$discount_c) $discount_c =0.7;
			$total_price = $adult*$price+$child*$price*$discount_c+$senior*$price*$discount_s;
			$_SESSION['ticket']['num_of_ticket'] = $num_of_ticket;
			$_SESSION['ticket']['total_price'] = $total_price;
			header("location:index.php?app-payment");
			exit();
		}
		//$this->op->test($_SESSION['ticket']);
		$this->tmpl->assign('ticket',$_SESSION['ticket']);
		$this->tmpl->display('buyticket');
	}

	public function price(){
		$a = $this->op->get('a');
		$r = $this->op->get('b')/10;
		echo $a*$_SESSION['ticket']['price']*$r;
	}
	public function payment(){
		if(!isset($_SESSION['ticket'])) {
			header("location:index.php?app-movie_list");
			exit();
		}
		$use_card = $this->op->get('use_card');
		$add_card = $this->op->get('add_card');
		$ticket = $_SESSION['ticket'];
		$ticket['userid'] = $_SESSION['user']['sessionuserid'];
		if($use_card){
			$id = $this->op->get('card');
			$card = $this->ticket->get_saved_card();
			$ticket['payment'] = serialize($card[$id]);
			//$this->op->test($ticket);
			$a = $this->ticket->process_payment($ticket);
			//header("location:index.php?app-confirmation&a=$a");
			if(!$a){
				$this->op->swal('can not process you order, please try a new card','','error','index.php?app-payment');
				exit;
			}
			$this->confirmation($a);
			exit();
		}
		elseif($add_card){
			$save = $this->op->get('save');
			$args = $this->op->get('args');
			if(empty($args['name']) or empty($args['number']) or empty($args['cvv']) or empty($args['expiration']) ) {
				$this->op->swal('empty card info','','error','index.php?app-payment');
				exit;
			}
			
			//var_dump(strlen($args['number'])!=16);
			if(strlen($args['number'])!=16){
				$this->op->swal('Invalid Card Number','','error','index.php?app-payment');
				exit;
			}
			if(strtotime($args['expiration'])<time()){
				$this->op->swal('Expired, try another one','','error','index.php?app-payment');
				exit;
			}
			$ticket['payment'] = serialize($args);
			if($save){
				$args['userid'] = $ticket['userid'];
				$this->ticket->save_card($args);
			}
			//$this->op->test($ticket);

			$a = $this->ticket->process_payment($ticket);
			//var_dump($a);
			//exit();
			if(!$a){
				$this->op->swal('can not process you order, please try again','','error','index.php?app-payment');
				//header("location:index.php?app-payment&e=1");
				exit;
			}
			$this->confirmation($a);
			exit();
		}
		$card = $this->ticket->get_saved_card();
		//$this->op->test($_SESSION['ticket']);
		$this->tmpl->assign('ticket',$_SESSION['ticket']);
		$this->tmpl->assign('saved_card',$card);
		$this->tmpl->display('payment');
	}

	public function confirmation($a=null){
		if(!isset($_SESSION['ticket'])) {
			header("location:index.php?app-movie_list");
			exit();
		}
		$this->op->swal('Success','Your purchurs is complete','success');
		$ticket = $_SESSION['ticket'];
		$movie_list = $_SESSION['movie_list'];
		
		unset($_SESSION['rand']);
		unset($_SESSION['select_movie']);
		unset($_SESSION['selected_theater']);
		unset($_SESSION['ticket']);
		$this->tmpl->assign('ticket',$ticket);
		$this->tmpl->assign('order_id',$a);
		$this->tmpl->display('confirmation');
	}

	public function order_history(){
		$id = $this->op->get('id');
		$detail = $this->op->get('detail');
		$this->aboutme->check_order_status();
		if($id)
			$a = $this->aboutme->get_order_by_id($id);
		elseif($detail){
			$id = $this->op->get('select');
			if($id){
				//header("location:index.php?app-order_detail&i=$id");
				$this->order_detail($id);
				exit();
			}
			$a = $this->aboutme->get_order_history($_SESSION['user']['sessionuserid']);
		}
		else
			$a = $this->aboutme->get_order_history($_SESSION['user']['sessionuserid']);
		$this->tmpl->assign('order',$a);
		$this->tmpl->display('order_history');
	}

	public function order_detail($id=null){
		if(!$id) $id = $_SESSION['orderID'];
		$a = $this->aboutme->get_order_by_id($id)[0];
		$date = strtotime($a['date']);
		$a['date']=date('l, M d',$date);
		$a['time']=date('h:i a',$date);
		$this->tmpl->assign('ticket',$a);
		$this->tmpl->display('order_detail');
	}
	public function cancel(){
		$id = $this->op->get('id');
		$a = $this->aboutme->get_order_by_id($id)[0];
		if($a['status']=='Unused'){
			$this->op->swal('You will be chagred $5 for cancellation fee','','warning');
			$this->aboutme->cancel_order($a,$id);
			
		}
		elseif($a['status']=='Cancelled'){
			$this->op->swal('Illegal operation','This order is already cancelled','error','index.php?app-order_history');
			exit;
		}
		else{
			$this->op->swal('Error','Completed order can not be cancelled','error','index.php?app-order_history');
			exit;
		}
	}

	public function mypayment(){
		$num = $this->op->get('num');
		if($num){
			$this->aboutme->delete_card_by_num($num);
		}

		$a = $this->aboutme->get_card_by_userid($_SESSION['user']['sessionuserid']);

		for($i=0;$i<count($a);$i++){
			$date = date_create($a[$i]['expiration']);
			$a[$i]['expiration'] = $date->format('m/Y');
		}

		$this->tmpl->assign('card',$a);
		$this->tmpl->display('mypayment');
	}

	public function preferred_theater(){
		$name =$this->op->get('name');
		if($name){
			$this->ticket->delete_theater($name);
		}

		$theater_list = $this->ticket->get_prefered_theater();
		$this->tmpl->assign('theater',$theater_list);
		$this->tmpl->display('preferredTheater');
	}

	public function logout()
	{
		$this->session->clearSession();
		header("location:index.php?user-login");
		exit;
	}
}

?>
