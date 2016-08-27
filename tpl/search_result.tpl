<script src="sweetalert_master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert_master/dist/sweetalert.css">
{cs4400;include:header}
<div class="normal">
	<div class="title">
	<span class='movie_title'>Result</span>
</div>
<form method="post" action="index.php?app-search_result">
	{cs4400;tree:$result,r,count}
	<input type="radio" name="selected_theater" value="{cs4400;$result[v:count]['name']}">&nbsp&nbsp {cs4400;$result[v:count]['name']}
</br>
	<div>&nbsp&nbsp &nbsp&nbsp &nbsp{cs4400;$result[v:count]['address']}</div>
</br>
	{cs4400;endtree}
</br>
	<input type="checkbox" name="save" value='1'> <span>save this theater </span> &nbsp &nbsp 
	<button type ="subbmit">Next</button>
	<input type="hidden" name="next" value="1"/>
</form>
