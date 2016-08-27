<html>
<head>
<style type="text/css">
a:link {
    color: #117da9;
    text-decoration: none;
}
a:visited {
    color: #117da9;

}
a:hover {
    color: #117da9;
    text-decoration: underline;;
}
a:active {
    color: #117da9;
    text-decoration: underline;;
}
</style>
{cs4400;include:header}
</head>
<body>
<div><a href='index.php?app-aboutme'>About Me</a></div>

<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Now Playing</span>
	</div>
	<table>
			{cs4400;tree:$movie_list,movie,count}
			{cs4400;if:v:count %4==0 }
			<tr>
			{cs4400;endif}

			<td><a href="index.php?app-movie_info&movie_name={cs4400;v:movie['name'] }">{cs4400;v:movie['name'] }</a></td>
			
			{cs4400;if:v:count %4==3 }
			</tr>
			{cs4400;endif}
			
			
		
		{cs4400;endtree}
		</tr>
	</table>
</div>


<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Coming Soon</span>
	</div>
	<table>
			{cs4400;tree:$coming_soon,movie,count}
			{cs4400;if:v:count %4==0 }
			<tr>
			{cs4400;endif}

			<td><a href="index.php?app-movie_info&movie_name={cs4400;v:movie['name'] }">{cs4400;v:movie['name'] }</a></td>
			
			{cs4400;if:v:count %4==3 }
			</tr>
			{cs4400;endif}
			
			
		
		{cs4400;endtree}
		</tr>
	</table>
</div>


<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Showing History</span>
	</div>
	<table>
			{cs4400;tree:$not_avai,movie,count}
			{cs4400;if:v:count %4==0 }
			<tr>
			{cs4400;endif}

			<td><a href="index.php?app-movie_info&movie_name={cs4400;v:movie['name'] }">{cs4400;v:movie['name'] }</a></td>
			
			{cs4400;if:v:count %4==3 }
			</tr>
			{cs4400;endif}
			
			
		
		{cs4400;endtree}
		</tr>
	</table>
</div>


<div class="" style="margin-left:345px;">
	<a href='index.php?app-logout'><button>log out</button></a>
	</div>
</body>
</html>