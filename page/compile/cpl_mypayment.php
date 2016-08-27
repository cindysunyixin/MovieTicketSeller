
<script type="text/javascript">
	function a(button){
		var radios = document.getElementsByClassName("example");
		for (var i = 0; i < radios.length; i++) {
    		if (radios[i].checked) {
        		button.value = radios[i].value;
    		}
		}

	}
</script>
<?php $this->_compileInclude('header'); ?>
<table>
	<tr>
		<th colspan="2">&nbspSelect&nbsp</td>
		
		<th colspan="2">&nbsp&nbspCard Number&nbsp&nbsp</td>
		
		<th colspan="2">&nbsp&nbsp Name On Card &nbsp&nbsp</td>
		<th colspan="2">&nbsp&nbsp Exp Date &nbsp&nbsp</td>
		
	</tr>
	<?php $count = -1;
 
				foreach($this->tpl_var['card'] as $key => $a){ 
					$count++; ?>
	<tr>
		<td colspan="2"><input type="radio" value="<?php echo $this->tpl_var['card'][$count]['number']; ?>" class="example" name ="num"></td>	
		<td colspan="2"><?php echo $this->tpl_var['card'][$count]['number']; ?>&nbsp&nbsp</td>	
		
		<td colspan="2">&nbsp<?php echo $this->tpl_var['card'][$count]['name']; ?></td>	
		
		<td colspan="2">&nbsp<?php echo $this->tpl_var['card'][$count]['expiration']; ?></td>	
		
	</tr>
	<?php } ?>

</table>
<div class="button">
<form action"index.php?app-mypayment" method="post" style="display:inline; margin-right:10px;">
	</br>
	<button type="submit" name="num" value="" onclick = 'a(this)'> Delete</button>
</form>

<a href='index.php?app-aboutme'><button>Back</button></a>
</div>