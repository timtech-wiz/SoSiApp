 
<?php include "includes/headers.php";
$msg = ""; ?>
<?php include "reg_process.php" ?>

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
	h2{
		text-align: center;
		padding-top: 40px;
		padding-right: 1000px;

	}
	.smart{
		text-align: center;
		padding-right: 500px

	}
 
	}

</style>

<h2>Register</h2>
 

<form class="form" method="POST" action="">
	<h4 class="smart"><?php if(isset($msg)) echo $msg; ?></h4>
	<div class="form-group">
	<label for="username">Username:</label>
	<input type="text" name="username" class="form-control" placeholder="Enter your Username" required>
	</div>

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


