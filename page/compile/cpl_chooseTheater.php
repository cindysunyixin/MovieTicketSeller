<?php $this->_compileInclude('header'); ?>

<div class="normal">
	<div class="title">
	<span class='movie_title'>Choose Theater</span>
</div>
<form action="index.php?app-choosetheater" method="post">
	<div style="width:80%; margin-left:105px;margin-bottom:10px;">
		<span>prefered theater: </span>
			<select name="theater_name">
			<?php $count = -1;
 
				foreach($this->tpl_var['saved_theater'] as $key => $theater_name){ 
					$count++; ?>
				<option><?php echo $this->tpl_var['saved_theater'][$count]['name']; ?></option>
			<?php } ?>
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