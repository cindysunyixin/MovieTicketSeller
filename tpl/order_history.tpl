{cs4400;include:header}


<div class="normal">
	<div class="title">
	<span class='movie_title'><b>Order History</b></span>
</div>


<form action"index.php?app-order_history" method="post">
	<div class="button">
	<span>Order ID:</span>&nbsp<input type="text" name="id" msg="xxx"/> <button type="submit">search</button>
	</div>

</br>
	<table >
		<tr>
			<th colspan="2">&nbspSelect&nbsp</th>
			
			<th colspan="2">&nbsp&nbspOrder ID&nbsp&nbsp</th>
			
			<th colspan="2">&nbsp&nbspMovie&nbsp&nbsp</th>
			<th colspan="2">&nbsp&nbsp Status &nbsp&nbsp</th>
			
			<th colspan="2">Total Cost</th>
			<th colspan="2">Refund</th>
		</tr>
		</table>
</form>
	<form action"index.php?app-order_history" method="post" style="margin-top:-17px">
		<table>
		{cs4400;tree:$order,a,count}
		<tr>
			<td colspan="2"><input type="radio" value="{cs4400;$order[v:count]['id']}" name="select"></td>	
			<td colspan="2">{cs4400;$order[v:count]['id']}&nbsp&nbsp</td>	
			
			<td colspan="2">&nbsp{cs4400;$order[v:count]['movie_name']}</td>	
			
			<td colspan="2">&nbsp{cs4400;$order[v:count]['status']}</td>	
			
			<td colspan="2">&nbsp &nbsp{cs4400;$order[v:count]['total_price']}</td>	
			<td colspan="2">&nbsp &nbsp{cs4400;$order[v:count]['refund']}</td>	
		</tr>
		{cs4400;endtree}

	</table>
	</br>
	<div class="button">
		<button type="submit" name="detail" value="1">view detail</button>
	</div>
</form>

<div class="button">
	<a href='index.php?app-aboutme'><button>Back</button></a>
</div>
