<script src="sweetalert_master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert_master/dist/sweetalert.css">
<?php $this->_compileInclude('header'); ?>
<div class="normal">
	<div class="title">
	<span class='movie_title'>Select time </span>
</div>

<script type="text/javascript">
	function showTime($str){
		if($str == ""){
			document.getElementById('txtHint').innerHTML="";
			return;
		}
		
		if(window.XMLHttpRequest){
			$x = new XMLHttpRequest();
		}
		else{
			$x = new ActiveXObject("Microsoft.XMLHTTP");
		}
		document.getElementById('movie_date').innerHTML = "date : "+$str;
		document.getElementById('movie_date').style.display="inline";
		$x.onreadystatechange=function()
		{	
			if ($x.readyState==4 && $x.status==200)
			{
				document.getElementById("txtHint").innerHTML=$x.responseText;
			}
		}
		$x.open("GET","index.php?app-movie_time&date="+$str,true);
		$x.send();
	}
	function showbutton($value){
		
		document.getElementById('sub').style.display="block";
		document.getElementById('movie_time').innerHTML = "time : "+$value;
		document.getElementById('movie_time').style.display="inline";
	}		

	function alert_swal($str){
		//setTimeout(function () { swal("opiuytr!","","");});
	}
	
</script>
<div>

	<span>movie :  <?php echo $this->tpl_var['select_movie']['name']; ?></span>
	&nbsp &nbsp &nbsp &nbsp
	<span>level :  <?php echo $this->tpl_var['select_movie']['level']; ?></span>
	&nbsp &nbsp &nbsp &nbsp
	<span>duration :  <?php echo $this->tpl_var['select_movie']['duration']; ?></span>
	&nbsp &nbsp &nbsp &nbsp
	<span>theater : <?php echo $this->tpl_var['theater_name']; ?></span>
	&nbsp &nbsp &nbsp &nbsp
	<span id="movie_date" style='display:none'>date : </span>
	&nbsp &nbsp &nbsp &nbsp
	<span id="movie_time" style='display:none'>time : </span>
</div>
<div>
	
	<form action="index.php?app-select_time" method="post" style="margin-top:10px;">
		<span>Select a Date:&nbsp </span>
		<input type="date" name="date" min="<?php echo $this->tpl_var['current_date']; ?>" max="<?php echo $this->tpl_var['max_date']; ?>" value ="<?php echo $this->tpl_var['current_date']; ?>" onchange="showTime(this.value)"><br><br>
		<div id="txtHint"></div>
	</br>
		<div><a href="index.php?app-choosetheater&movie_name=<?php echo $this->tpl_var['select_movie']['name']; ?>">change theater</a></div>

