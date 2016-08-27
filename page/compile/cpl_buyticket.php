
<script type="text/javascript">
	function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    return !(charCode > 31 && (charCode < 48 || charCode > 57));
	}
	function a($str,$r){

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
		$x.onreadystatechange=function()
		{	
			if ($x.readyState==4 && $x.status==200)
			{	
				document.getElementById("result"+$r).innerHTML=$x.responseText;
			}
		}

		$x.open("GET","index.php?app-price&a="+$str+'&b='+$r,true);
		$x.send();
	}
	function test(){
		alert(111);
	}
</script>
<?php $this->_compileInclude('header'); ?>
<div class="normal">
	<div class="title">
	<span class='movie_title'>Buy Ticket</span>
</div>

<table class='but_ticket'>
	
	<tr style="width:40px;">
		<td style="width:1140px;"><b><?php echo $this->tpl_var['ticket']['movie_name']; ?></b></td>
		<td style="width:1140px;"><b><?php echo $this->tpl_var['ticket']['theater_name']; ?></b></td>
	</tr>
	</b>
	<tr>
		<td><?php echo $this->tpl_var['ticket']['level']; ?> <?php echo $this->tpl_var['ticket']['duration']; ?></td>
		<td><?php echo $this->tpl_var['ticket']['theater_address']; ?></td>
	</tr>
	
	<tr>
		<td><b><?php echo $this->tpl_var['ticket']['date']; ?></b></td>
		<td></td>
	</tr>
	<tr>
		<td><b><?php echo $this->tpl_var['ticket']['time']; ?></b></td>
		<td></td>
	</tr>
	</b>
</table>
</br></br>
<span>How Many Ticket? </span>
<form method="post" action="index.php?app-buyticket" style="margin-top:10px;">
 Adult : &nbsp<input type="number" name="adult" onkeypress="return isNumberKey(event);" onkeyup="a(this.value,10);" min='0' onchange="a(this.value,10);" value='0' > &nbsp <span>*<?php echo $this->tpl_var['ticket']['price']; ?> =</span><span id='result10'>0</span>
</br>
 Child : &nbsp<input type="number" name="child" onkeypress="return isNumberKey(event);" onkeyup="a(this.value,7);" min='0' onchange="a(this.value,7);" value='0'  style="margin-top:10px;"> &nbsp <span>*<?php echo $this->tpl_var['ticket']['price']; ?>*0.7 =</span><span id='result7'>0</span>
</br>
 Senior: <input type="number" name="senior" onkeypress="return isNumberKey(event);" onkeyup="a(this.value,8);" min='0' onchange="a(this.value,8);" value='0'  style="margin-top:10px;"> &nbsp <span>*<?php echo $this->tpl_var['ticket']['price']; ?>*0.8 =</span><span id='result8'>0</span>
 <br/>
 <button type="submit" name='next' value ='1'>Next</button>
</form>

