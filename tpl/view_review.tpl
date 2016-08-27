
{cs4400;include:header}
{cs4400;if:$s}
	<span><b> Succuss</b></span>
</br>
{cs4400;endif}
<div class='title'>
<span class='movie_title'><b>{cs4400;$movie['name']}</b></span>
<span class = "rating">&nbsp &nbsp Avg Rating: {cs4400;$movie['rating']}</span>
</div>
</br>
{cs4400;if:$complete_order}
<a href="index.php?app-give_review" style="width:80%; margin:auto; margin-left:95px;"><button >Give Review</button></a>
</br>
</br>
{cs4400;endif}

{cs4400;tree:$review,rv,count}
<div style="border:1px solid black;width:80%; margin:auto; margin-left:100px;">
	<div>
		title : {cs4400;$review[v:count]['title']}
	</div>
	<div>
		rating: {cs4400;$review[v:count]['rating']}
	</div>
	<div>
		comment: {cs4400;$review[v:count]['comment']}
	</div>

	</div>
		</br>
{cs4400;endtree}

<a href="index.php?app-movie_info&movie_name={cs4400;$movie['name']}" style="width:80%; margin:auto; margin-left:92px;"><button >Back</button></a>