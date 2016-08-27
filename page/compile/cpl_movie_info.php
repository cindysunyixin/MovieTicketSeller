<?php $this->_compileInclude('header'); ?>
<table>

<tr>
	<th>Movie info</th>
	<th></th>
	
</tr>
<tr style="font-size; color:orange">
	<td><b>name: </b></td>
	<td><b><?php echo $this->tpl_var['movie_info']['name']; ?></b></td>
</tr>
<?php if($this->tpl_var['movie_info']['status']==1){ ?>
	<tr>
		<td><b>status:</b></td> <td><b>released</b></td>
	</tr>
<?php } else { ?>
	<tr>
		<td><b>status:</b></td> 
		<td><b>coming soon</b></td>
	</tr>
<?php } ?>
<tr>
	<td><b>release_data:</b></td>  
	<td><b> <?php echo $this->tpl_var['movie_info']['release_data']; ?></b></td>
</tr>

<tr>
	<td><b>level:</b></td>
	<td><b><?php echo $this->tpl_var['movie_info']['level']; ?></b></td>
</tr>

<tr>
	<td><b>duration:</b></td>
	<td><b><?php echo $this->tpl_var['movie_info']['duration']; ?></b></td>
</tr>

<tr>
	<td><b>type:</b></td>
	 <td><b><?php echo $this->tpl_var['movie_info']['type']; ?></b></td>
</tr>

<tr>
	<td><b>rating:</b></td>
	<td><b><?php echo $this->tpl_var['movie_info']['rating']; ?></b></td>
</tr>

<tr>
	<td><b>num_of_rating:</b></td>
	 <td><b> <?php echo $this->tpl_var['movie_info']['num_of_rating']; ?></b></td>
</tr>
</table>
</br>
<div class="button" >
	<a href="index.php?app-index}"><button>index</button></a>
	<span>&nbsp</span>
	<span>&nbsp</span>
	<a href="index.php?app-overview&movie_name=<?php echo $this->tpl_var['movie_info']['name']; ?>"><button>overview</button></a>
	<?php if($this->tpl_var['review']){ ?>
	<span>&nbsp</span>
	<span>&nbsp</span>
	<a href="index.php?app-review&movie_name=<?php echo $this->tpl_var['movie_info']['name']; ?>"><button>review</button></a>
	<?php } ?>
	<?php if($this->tpl_var['movie_info']['isplaying']){ ?>
	<span>&nbsp</span>
	<span>&nbsp</span>
	<a href="index.php?app-choosetheater&movie_name=<?php echo $this->tpl_var['movie_info']['name']; ?>"><button>buy ticket</button></a>
	<?php } ?>
</div>
