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
		<td><b><span>Movie Name:</span> {cs4400;$ticket['movie_name']}</b></td>
	</tr>
	<tr>
		<td><b><span>Theater: </span>{cs4400;$ticket['theater_name']}</b></td>
	</tr>
	<tr>
		<td><b><span>Address: </span>{cs4400;$ticket['theater_address']}</b></td>
	</tr>
	<tr>
		<td><b><span>Level: </span>{cs4400;$ticket['level']}</b></td>
	</tr>
	<tr>
		<td><b><span>Date: </span>{cs4400;$ticket['date']}</b></td>
		
	</tr>
	<tr>
		<td><b><span>Time: </span>{cs4400;$ticket['time']}</b></td>
	</tr>
	<tr>
		<td><b><span>Num of tickets: </span>{cs4400;$ticket['num_of_ticket']}</b></td>		
	</tr>
	<tr>
		<td><b><span>Total cost: </span>${cs4400;$ticket['total_price']}</b></td>
	</tr>
	<tr>
		<td><b><span>Order status: </span>{cs4400;$ticket['status']}</b></td>
	</tr>
	{cs4400;if:$ticket['status']=='Cancelled'}
	<tr>
		<td><b><span>Refund: </span>{cs4400;$ticket['refund']}</b></td>
	</tr>
	{cs4400;endif}
	
</table>
</br></br>
<form action="index.php?app-cancel" method="post">
	<input type ="hidden" name='id' value = '{cs4400;$ticket['id']}' > 
<button type="submit">Cancel Odrder</button>
</form>
</br>
</br>
<a href='index.php?app-order_history'><button>Back</button></a>