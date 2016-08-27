<style type="text/css">
tr{
	display: block;
	margin-top: 3px;
}
tr:nth-child(even) {background-color: #f2f2f2}

tr:hover {
	background-color: #ddd
}
tr td span{
	display:inline-block; 
	width: 120px;
}

button {
  
  display: inline-block;
 	padding: 3px 14px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 125px;
  box-shadow: 0 3px #999;
}

button:hover {background-color: #3e8e41}

button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
div{
	padding-bottom: 10px;
}
</style>
<div style="text-align: center"></div>
<table>
	
	<tr>
		<td><b><span>Movie Name:</span> <?php echo $this->tpl_var['ticket']['movie_name']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Theater: </span><?php echo $this->tpl_var['ticket']['theater_name']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Address: </span><?php echo $this->tpl_var['ticket']['theater_address']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Level: </span><?php echo $this->tpl_var['ticket']['level']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Date: </span><?php echo $this->tpl_var['ticket']['date']; ?></b></td>
		
	</tr>
	<tr>
		<td><b><span>Time: </span><?php echo $this->tpl_var['ticket']['time']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Num of tickets: </span><?php echo $this->tpl_var['ticket']['num_of_ticket']; ?></b></td>		
	</tr>
	<tr>
		<td><b><span>Total cost: </span>$<?php echo $this->tpl_var['ticket']['total_price']; ?></b></td>
	</tr>
	<tr>
		<td><b><span>Order status: </span><?php echo $this->tpl_var['ticket']['status']; ?></b></td>
	</tr>
	<?php if($this->tpl_var['ticket']['status']=='Cancelled'){ ?>
	<tr>
		<td><b><span>Refund: </span><?php echo $this->tpl_var['ticket']['refund']; ?></b></td>
	</tr>
	<?php } ?>
	
</table>
</br></br>
<form action="index.php?app-cancel" method="post">
	<input type ="hidden" name='id' value = '<?php echo $this->tpl_var['ticket']['id']; ?>' > 
<button type="submit">Cancel Odrder</button>
</form>
</br>
</br>
<a href='index.php?app-order_history'><button>Back</button></a>