<body>
	{cs4400;include:header}
	<table style="float:left; margin-top:-85px;">
		<form action ="index.php?user-register" method = "post">
			<tr>
				<td style="width:220px;">username:</td><td> <input type='text' name='username'></td>
			</br>
			</tr>

			<tr>
				<td>password:</td><td> <input type='password' name='password'></td>
			</br>
			<tr>
				<td>confirm password:</td><td> <input type='password' name='confirm'></td>
			</br>
			</tr>

			<tr>
				<td>manager password: </td><td><input type='password' name='manager_password'>
			</td>
			</br>
			</tr>

			<tr>
				<td>email: </td><td><input type='text' name='email'></td>
			</br>
			</tr>
			<tr>
				<td colspan="2">
			
					<button type="submit" value="" style="float:left; margin-left:18%;">register</button>
					<input type='hidden' value ='1' name='register'/>
				</td>
			</tr>
			
		</form>
	</table>
	

</body>