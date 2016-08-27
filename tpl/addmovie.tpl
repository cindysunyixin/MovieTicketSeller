<html>
<head>
	<script type="text/javascript">
		function a(x){
			document.getElementById('idx').value = x.value;
			var o = document.getElementsByClassName("theater");
			document.getElementById('name').value = o[x.value].innerHTML;
		}
	</script>
</head>
<body>
<form action="index.php?app-addmovie" method ="post">
	

		<div>
			name:
			<input type="text" name="args[name]">
		</div>

		<div>
			release_data:
			<input type="text" name='args[release_data]'>
		</div>
		<div>
			level:
			<input type="text" name='args[level]'>
		</div>
		<div>
			duration:
			<input type="text" name='args[duration]'>
		</div>
		<div>
			type:
			<input type="text" name='args[type]'>
		</div>
		<div>
			status:
			<select  name="args[status]">
			  <option value ="1">Active</option>
			  <option value ="0">Inactive</option>
			</select>
		</div>

		<div>
			theater:
			<select onchange="a(this)">
				{cs4400;tree:$theater,v,count}
				<option value="{cs4400;v:count}" class="theater">{cs4400;$theater[v:count]['name']}</option>
				{cs4400;endtree}
			</select>
			<input type="hidden" id="idx" name='theater[index]'> 
			<input type="hidden" id="name" name ="theater[name]">
		</div>
</br>
		<div>
			schedule:
			<textarea  name="schedule"></textarea>
		</div>
		</br>
		<div>
			ticket price:
			<input type="text" name='price'>
		</div>
		<div>
			<input type="hidden" value="1" name="add">
			<input type="submit" value="submit">
		</div>
	
</form>
</body>
</html>