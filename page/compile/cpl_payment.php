

<script type="text/javascript">
	function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    return !(charCode > 31 && (charCode < 48 || charCode > 57));
	}
	function check(a){
		return a.length ==16;
	}
</script>

<?php $this->_compileInclude('header'); ?>


<div class="normal">
	<div class="title">
	<span class='movie_title'>Payment</span>
</div>

<table>
	
	<tr>
		<td style="width:1140px;"><b><?php echo $this->tpl_var['ticket']['movie_name']; ?></b></td>
		<td style="width:1140px;"><b><?php echo $this->tpl_var['ticket']['theater_name']; ?></b></td>
	</tr>
	</b>
	<tr>
		<td><?php echo $this->tpl_var['ticket']['level']; ?> <?php echo $this->tpl_var['ticket']['duration']; ?></td>
		<td><?php echo $this->tpl_var['ticket']['theater_address']; ?></td>
	</tr>
	
	<tr>
		<td><b><?php echo $this->tpl_var['ticket']['date']; ?></b></td>
		<td></td>
	</tr>
	<tr>
		<td><b><?php echo $this->tpl_var['ticket']['time']; ?></b></td>
		<td></td>
	</tr>
	</b>
</table>
</br></br>

<span>Payment Information</span>
</br></br>

<form action="index.php?app-payment" method="post">
	<div>
		 <span>Use a saved card </span> <select name="card">
			<?php $count = -1;
 
				foreach($this->tpl_var['saved_card'] as $key => $card_num){ 
					$count++; ?>
				<option value="<?php echo $count; ?>"><?php echo $this->tpl_var['saved_card'][$count]['number']; ?></option>
			<?php } ?>
				</select>
				&nbsp &nbsp
			<button type = 'submit' value="1" name="use_card">buy ticket</button>
	</div>
</form>
<form action="index.php?app-payment" method="post">
	<div>
		</br>
		<legend>Use a new card</legend>
	<table style="margin:0;">
		<tr>
			<td style="width:300px;"><span>Name on Card</span></td>
			<td style="width:300px;">&nbsp&nbsp<input type ="text" name="args[name]"/></td>
		</tr>

		<tr>
			<td><span>Card Number</span></td>
			<td>&nbsp&nbsp<input type ="text" name="args[number]" onkeypress="return isNumberKey(event);" maxlength='16'/></td>
		</tr>

		<tr>
			<td><span>CVV</span></td>
			<td>&nbsp&nbsp<input type ="text" name="args[cvv]" onkeypress="return isNumberKey(event);" id="txt" maxlength='3'/></td>
		</tr>

		<tr>
			<td><span>expiration Date</span></td>
			<td>&nbsp&nbsp<input type ="month" name="args[expiration]"/></td>
		</tr>
		
	</table>
		</br>
		<input type="checkbox" name ='save' value ='1'> <span>save this card </span> &nbsp&nbsp 
		<button type="submit" value="1" name="add_card"> submit </button>
	</div>
</form>

