

<h2><?php echo $this->tpl_var['movie']['name']; ?></h2>
<form action="index.php?app-give_review" method ="post" style="margin-top:-60px;">
	
	<table>		
	<tr>
		<td>Rating:</td><td> <select name="args[rating]">
					<option>5</option>
					<option>4</option>
					<option>3</option>
					<option>2</option>
					<option>1</option>
				</select>
		</td>
	</tr>
</br>
	<tr>
		<td>Title:</td><td><input type="text" name="args[title]"></td>
	</tr>
</br>
	<tr>
		<td>Comment: </td><td><textarea name="args[comment]"></textarea></td>
	</tr>

</br>

</table>
	<input type='hidden' name="give_review" value ='1'/>
	<input type="submit">
</form>
<a href="index.php?app-review"><button>Back</button></a>