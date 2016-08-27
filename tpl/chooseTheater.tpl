{cs4400;include:header}

<div class="normal">
	<div class="title">
	<span class='movie_title'>Choose Theater</span>
</div>
<form action="index.php?app-choosetheater" method="post">
	<div style="width:80%; margin-left:105px;margin-bottom:10px;">
		<span>prefered theater: </span>
			<select name="theater_name">
			{cs4400;tree:$saved_theater,theater_name,count}
				<option>{cs4400;$saved_theater[v:count]['name']}</option>
			{cs4400;endtree}
				</select>
				&nbsp &nbsp
			<button type = 'submit' value="1" name="choose_theater">choose</button>
	</div>
</form>
<form action="index.php?app-choosetheater" method="post">
	<div style="width:80%; margin-left:105px;margin-bottom:10px;">
		<span style="width:40px;">City/State/Theater:<span> <input type='text' name="search_info">
		&nbsp &nbsp
		<button type="submit" value="1" name="search_theater"> search </button>
	</div>
</form>

</div>