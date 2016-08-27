
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
<?php $this->_compileInclude('header'); ?>
<div class="normal" >
	<div class="title">
	<span class='movie_title'>My Prefered Theater</span>
</div>
		
</br>
	<?php $count = -1;
 
				foreach($this->tpl_var['theater'] as $key => $r){ 
					$count++; ?>
	<div class="normal" style="border:none; margin-top:10px;">
	<input type="radio" name="selected_theater" value="<?php echo $this->tpl_var['theater'][$count]['name']; ?>" class="a"><b>&nbsp&nbsp <?php echo $this->tpl_var['theater'][$count]['name']; ?></b>

</br>
	<span>&nbsp&nbsp &nbsp&nbsp &nbsp<?php echo $this->tpl_var['theater'][$count]['address']; ?></span>

</div>
	<?php } ?>
</br>

<div class="button">
<form action"index.php?app-preferred_theater" method="post" style="display:inline">
	</br>
	<button type="submit" name="name" value="" onclick = 'a(this)'> Delete</button>
</form>

<a href='index.php?app-aboutme'><button>Back</button></a>
</div>
