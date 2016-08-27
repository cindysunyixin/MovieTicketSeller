{cs4400;include:header}
<div class="title">
	<span class='movie_title'>{cs4400;$overview['name']}</span>
</div>


<div style="width:80%; margin-left:105px;margin-bottom:10px;">
	<legend >synopsis: </legend>
</DIV>

<div style="border:solid 1px black; width:80%; margin-left:120px;margin-bottom:10px; padding:10px 20px 10px 20px;">
		

		<legend>{cs4400;$overview['synopsis']}</legend>
	</div>
	

</div>

<div style="border:solid 1px black; width:80%; margin-left:120px;margin-bottom:10px; padding:10px 20px 10px 20px;">
	<legend>cast: </legend>
	{cs4400;tree:$overview['cast'],v,i}
	<legend style="color:#59aff8">{cs4400;v:v}</legend>
	{cs4400;endtree}
</div>

<div style="width:80%; margin-left:100px;margin-bottom:10px;">
	<legend>
		<a href="index.php?app-movie_info&movie_name={cs4400;$name}"><button>back</button></a>
	</legend>
</DIV>

