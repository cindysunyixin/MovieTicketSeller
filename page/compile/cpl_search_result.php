<script src="sweetalert_master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert_master/dist/sweetalert.css">
<?php $this->_compileInclude('header'); ?>
<div class="normal">
	<div class="title">
	<span class='movie_title'>Result</span>
</div>
<form method="post" action="index.php?app-search_result">
	<?php $count = -1;
 
				foreach($this->tpl_var['result'] as $key => $r){ 
					$count++; ?>
	<input type="radio" name="selected_theater" value="<?php echo $this->tpl_var['result'][$count]['name']; ?>">&nbsp&nbsp <?php echo $this->tpl_var['result'][$count]['name']; ?>
</br>
	<div>&nbsp&nbsp &nbsp&nbsp &nbsp<?php echo $this->tpl_var['result'][$count]['address']; ?></div>
</br>
	<?php } ?>
</br>
	<input type="checkbox" name="save" value='1'> <span>save this theater </span> &nbsp &nbsp 
	<button type ="subbmit">Next</button>
	<input type="hidden" name="next" value="1"/>
</form>
