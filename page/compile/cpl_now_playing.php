<html>
<head>
<style type="text/css">
a:link {
    color: #117da9;
    text-decoration: none;
}
a:visited {
    color: #117da9;

}
a:hover {
    color: #117da9;
    text-decoration: underline;;
}
a:active {
    color: #117da9;
    text-decoration: underline;;
}
</style>
<?php $this->_compileInclude('header'); ?>
</head>
<body>
<div><a href='index.php?app-aboutme'>About Me</a></div>

<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Now Playing</span>
	</div>
	<table>
			<?php $count = -1;
 
				foreach($this->tpl_var['movie_list'] as $key => $movie){ 
					$count++; ?>
			<?php if($count %4==0 ){ ?>
			<tr>
			<?php } ?>

			<td><a href="index.php?app-movie_info&movie_name=<?php echo $movie['name'] ; ?>"><?php echo $movie['name'] ; ?></a></td>
			
			<?php if($count %4==3 ){ ?>
			</tr>
			<?php } ?>
			
			
		
		<?php } ?>
		</tr>
	</table>
</div>


<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Coming Soon</span>
	</div>
	<table>
			<?php $count = -1;
 
				foreach($this->tpl_var['coming_soon'] as $key => $movie){ 
					$count++; ?>
			<?php if($count %4==0 ){ ?>
			<tr>
			<?php } ?>

			<td><a href="index.php?app-movie_info&movie_name=<?php echo $movie['name'] ; ?>"><?php echo $movie['name'] ; ?></a></td>
			
			<?php if($count %4==3 ){ ?>
			</tr>
			<?php } ?>
			
			
		
		<?php } ?>
		</tr>
	</table>
</div>


<div class="normal" style="border:none">
	<div class="title">
		<span class='movie_title'>Showing History</span>
	</div>
	<table>
			<?php $count = -1;
 
				foreach($this->tpl_var['not_avai'] as $key => $movie){ 
					$count++; ?>
			<?php if($count %4==0 ){ ?>
			<tr>
			<?php } ?>

			<td><a href="index.php?app-movie_info&movie_name=<?php echo $movie['name'] ; ?>"><?php echo $movie['name'] ; ?></a></td>
			
			<?php if($count %4==3 ){ ?>
			</tr>
			<?php } ?>
			
			
		
		<?php } ?>
		</tr>
	</table>
</div>


<div class="" style="margin-left:345px;">
	<a href='index.php?app-logout'><button>log out</button></a>
	</div>
</body>
</html>