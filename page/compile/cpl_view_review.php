
<?php $this->_compileInclude('header'); ?>
<?php if($this->tpl_var['s']){ ?>
	<span><b> Succuss</b></span>
</br>
<?php } ?>
<div class='title'>
<span class='movie_title'><b><?php echo $this->tpl_var['movie']['name']; ?></b></span>
<span class = "rating">&nbsp &nbsp Avg Rating: <?php echo $this->tpl_var['movie']['rating']; ?></span>
</div>
</br>
<?php if($this->tpl_var['complete_order']){ ?>
<a href="index.php?app-give_review" style="width:80%; margin:auto; margin-left:95px;"><button >Give Review</button></a>
</br>
</br>
<?php } ?>

<?php $count = -1;
 
				foreach($this->tpl_var['review'] as $key => $rv){ 
					$count++; ?>
<div style="border:1px solid black;width:80%; margin:auto; margin-left:100px;">
	<div>
		title : <?php echo $this->tpl_var['review'][$count]['title']; ?>
	</div>
	<div>
		rating: <?php echo $this->tpl_var['review'][$count]['rating']; ?>
	</div>
	<div>
		comment: <?php echo $this->tpl_var['review'][$count]['comment']; ?>
	</div>

	</div>
		</br>
<?php } ?>

<a href="index.php?app-movie_info&movie_name=<?php echo $this->tpl_var['movie']['name']; ?>" style="width:80%; margin:auto; margin-left:92px;"><button >Back</button></a>