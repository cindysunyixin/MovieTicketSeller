<script type="text/javascript">
	function update_rand_code(){
		//alert('222');
    document.getElementById('rand').src="index.php?user-randcode&"+Math.random();
} 
</script>
{cs4400;include:header}
<body>

<div class="row-fluid">
	<div class="container logcontent">
		<div class="logbox">
			<form class="form-horizontal logform" method="post" action="index.php?user-login">
				<fieldset>
					<legend>login</legend>
					<div class="logcontrol">
						<div class="control-group">
							<label class="control-label" for="inputEmail">uername: </label>
							<div class="controls">
								<input class="input-xlarge" type="text" name="args[username]" datatype="userName" needle="needle" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">password:</label>
							<div class="controls">
								<input class="input-xlarge" type="password" name="args[userpassword]" datatype="password" needle="needle" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">randcode:</label>
							<div class="controls">
								<input class="input-small" type="text" maxlength="4" name="args[randcode]"/>

								<span><img src="index.php?user-randcode" class="randCode img-rounded" id="rand" onclick="update_rand_code();"/></span>
							</div>
						</div>
					</br>
						<div class="control-group">
							<div class="controls">
								<input type="hidden" value="1" name="login"/>
								<button class="btn btn-info logbtn" type="submit">login</button>
								
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								
							</div>
						</div>
					</div>
				</fieldset>
			</form>
			<a href="index.php?user-register"> register</a>
		</div>
		<div class="logbotm"></div>
	</div>
</div>

 </body>
</html>