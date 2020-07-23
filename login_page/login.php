<?php include "includes/headers.php" ?>
<?php include "login_process.php" ?>
 

<?php include "includes/nav.php" ?>
<style type="text/css">
	.form{
		padding-top: 100px;
		padding-left: 400px;
	}
	.form-control{
		 width: 500px;
		 height: 30px;
	}
	.smart{
		text-align: center;
	}
	h2{
		text-align: center;
		padding-top: 40px;
		padding-right: 1000px;
	}

</style>

<h2>Login</h2>
<h4 class="smart"><?php if(isset($msg)) echo $msg; ?></h4>
<form class="form" method="POST" action="">

	<div class="form-group">
	<label for="email">Email:</label>
	<input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
	</div>

	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" class="form-control" placeholder="Enter your Username">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary btn-xs" name="submit" value="Submit">
	</div>
	
</form>

<?php include "includes/footers.php" ?>