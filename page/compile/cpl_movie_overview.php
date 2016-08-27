<?php $this->_compileInclude('header'); ?>
<div class="title">
	<span class='movie_title'><?php echo $this->tpl_var['overview']['name']; ?></span>
</div>


<div style="width:80%; margin-left:105px;margin-bottom:10px;">
	<legend >synopsis: </legend>
</DIV>

<div style="border:solid 1px black; width:80%; margin-left:120px;margin-bottom:10px; padding:10px 20px 10px 20px;">
		

		<legend><?php echo $this->tpl_var['overview']['synopsis']; ?></legend>
	</div>
	

</div>

<div style="border:solid 1px black; width:80%; margin-left:120px;margin-bottom:10px; padding:10px 20px 10px 20px;">
	<legend>cast: </legend>
	<?php $i = -1;
 
				foreach($this->tpl_var['overview']['cast'] as $key => $v){ 
					$i++; ?>
	<legend style="color:#59aff8"><?php echo $v; ?></legend>
	<?php } ?>
</div>

<div style="width:80%; margin-left:100px;margin-bottom:10px;">
	<legend>
		<a href="index.php?app-movie_info&movie_name=<?php echo $this->tpl_var['name']; ?>"><button>back</button></a>
	</legend>
</DIV>

