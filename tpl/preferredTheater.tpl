
<script type="text/javascript">
	function a(button){
		var radios = document.getElementsByClassName("a");
		for (var i = 0; i < radios.length; i++) {
    		if (radios[i].checked) {
        		button.value = radios[i].value;
    		}
		}

	}
</script>
{cs4400;include:header}
<div class="normal" >
	<div class="title">
	<span class='movie_title'>My Prefered Theater</span>
</div>
		
</br>
	{cs4400;tree:$theater,r,count}
	<div class="normal" style="border:none; margin-top:10px;">
	<input type="radio" name="selected_theater" value="{cs4400;$theater[v:count]['name']}" class="a"><b>&nbsp&nbsp {cs4400;$theater[v:count]['name']}</b>

</br>
	<span>&nbsp&nbsp &nbsp&nbsp &nbsp{cs4400;$theater[v:count]['address']}</span>

</div>
	{cs4400;endtree}
</br>

<div class="button">
<form action"index.php?app-preferred_theater" method="post" style="display:inline">
	</br>
	<button type="submit" name="name" value="" onclick = 'a(this)'> Delete</button>
</form>

<a href='index.php?app-aboutme'><button>Back</button></a>
</div>
