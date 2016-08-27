<?php
class manager{

	function __construct(&$G){
		$this->session = $G->load('session');
		$this->user = $G->load('customer');
		$this->tmpl = $G->load('template');
		//$this->tmpl = $G->load('manager');
		$this->op = $G->load('operation');
		$this->sql = $G->load('sql');
		$this->db = $G->load('db');
		$this->default_groupid=1;
		$this->user_data = $this->session->getSession();
		if(time()-$this->user_data['sessionmodifytime']>3600 || $this->user_data['sessionstatus']!=1){
			header('location:index.php?user-login');
			exit();
		}
		if($this->user_data['sessiongroupid'] !=2){
			$this->op->swal('Permission Dined','You are not manager','warning','index.php?app-index',2500);
			exit();
		}
	}
	function index(){
		$this->tmpl->display('manager_index');
	}
	function revenue(){
		$month = $this->op->get('month');
		$month_start = date("Y-m",strtotime($month));
		$m_end = date("Y-m",strtotime("+3 month",strtotime($month)));
		if($month){
			$sql['sql'] = 'SELECT month(date) as month,sum(total_price)-sum(refund) as revenue FROM order_detail WHERE date>= :s and date< :e GROUP BY month(date) order by month(date)';
			$sql['value'] = array('s'=>$month_start,'e'=>$m_end);
			$a = $this->db->fetchall($sql);
		}
		if(empty($a)) {
			for($i=0;$i<3;$i++){
				$rev[$i]['month'] = date("m",strtotime("+$i month",strtotime($month)));
				$rev[$i]['revenue'] = 0;
			}
		}
		elseif(count($a)==3){ 
			$rev = $a;
			for($i=0;$i<3;$i++){
				$rev[$i]['revenue'] = number_format($rev[$i]['revenue'],2);
			}
		}
		else{
			for($i=0;$i<3;$i++){
				$rev[$i]['month'] = date("m",strtotime("+$i month",strtotime($month)));
				for($j=0;$j<count($a);$j++){
					if($a[$j]['month']==$rev[$i]['month']){
						$rev[$i]['revenue'] = $a[$j]['revenue'];
						break;
					}
					else
						$rev[$i]['revenue'] = 0;
				}
			$rev[$i]['revenue'] = number_format($rev[$i]['revenue'],2);
			}
		}
		$this->tmpl->assign('revenue',$rev);
		$this->tmpl->display('revenue');	
	}
	
	function popular(){
		$month = $this->op->get('month');
		$month_first = date("Y-m",strtotime($month));
		$month_second = date("Y-m",strtotime("+1 month",strtotime($month)));
		$month_third = date("Y-m",strtotime("+2 month",strtotime($month)));
		$m_end = date("Y-m",strtotime("+3 month",strtotime($month)));
		$sql['sql'] = '
			(SELECT month(date) as month,movie_name,count(*) as num_of_order FROM order_detail WHERE date>= :first AND date< :second AND status !=:status group by movie_name order by count(*) DESC limit 0,3)
			UNION
			(SELECT month(date) as month,movie_name,count(*) as num_of_order FROM order_detail WHERE date>= :second AND date< :third AND status !=:status group by movie_name order by count(*) DESC limit 0,3)
			UNION
			(SELECT month(date) as month,movie_name,count(*) as num_of_order FROM order_detail WHERE date>= :third AND date< :end AND status !=:status group by movie_name order by count(*) DESC limit 0,3)
		';
		$sql['value'] = array(
							'first'=>$month_first,
							'second' => $month_second,
							'third' =>$month_third,
							'end' =>$m_end,
							'status' => 'Cancelled'
						);
		$a= $this->db->fetchall($sql);
		for($i=0;$i<9;$i++){
			if(empty($a[$i])) {
				$a[$i]['month'] = date("M",strtotime("+$i month",strtotime($month)));
				$a[$i]['movie'] = '';
				$a[$i]['num_of_orders'] = '';									
			}
		}
		
		for($i=0;$i<3;$i++){
			$rev[$i]['month'] = date("M",strtotime("+$i month",strtotime($month)));
			$j=0;
			foreach($a as $key=>$value)
			{
				if($value['month']==date("m",strtotime("+$i month",strtotime($month)))){				
					$rev[$i]['movie'][$j] = $value['movie_name'];
					$rev[$i]['num_of_order'][$j] = $value['num_of_order'];
					unset($a[$key]);
				}
				else{
					$rev[$i]['movie'][$j] = 'null';
					$rev[$i]['num_of_order'][$j] = 'null';
				}
				if($j==2) break;
				$j++;
			}
		}
		
		/*
		$this->op->test($rev);
		echo "<pre>";
		foreach ($rev as $k => $r) {
			print_r($r);
			# code...
		}
		echo "</pre>";
		
		*/
		$this->tmpl->assign('rev',$rev);
		$this->tmpl->display('popular_movie');	
	}
}
/*
(SELECT month(date),movie_name,count(*) FROM `order_detail` WHERE date>='2016-06' AND date<'2016-07' group by movie_name order by count(*) DESC limit 0,3)
UNION
(SELECT month(date),movie_name,count(*) FROM `order_detail` WHERE date>='2016-07' AND date<'2016-08' group by movie_name order by count(*) DESC limit 0,3)
UNION
(SELECT month(date),movie_name,count(*) FROM `order_detail` WHERE date>='2016-08' AND date<'2016-09' group by movie_name order by count(*) DESC limit 0,3)
*/
?>
