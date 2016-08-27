
<?php $this->_compileInclude('header'); ?>
<div class="normal">
	<div class="title">
	<span class='movie_title'>Confirmation</span>
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


<b><span >Confirmation:</span></b>
</br></br>
<span>Order Id: </span>	<span><b><?php echo $this->tpl_var['order_id']; ?></b></span>
</br>

<div>
	<a href="index.php?app-movie_list"><button>return to index</button></a>
	<span>&nbsp</span>
	<span>&nbsp</span>
	<a href="index.php?app-order_detail"><button>order detail</button></a>
	<span>&nbsp</span>
	<span>&nbsp</span>
	<a href="index.php?app-order_history"><button>order history</button></a>
</div>
