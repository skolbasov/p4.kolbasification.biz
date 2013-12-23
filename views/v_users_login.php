<form method='POST' action='/users/p_login' class="form-signin" role="form">
 	<h2 class="form-signin-heading">Please log in</h2>
	<?php if(isset($error)): ?>
	<div class="form-group has-error">
		Login failed. Please check your email for the activation link. Please double check entered email and password. 
	</div>
	<br>
	<?php endif; ?>

	<div class="form-group">
   		<label for="email" class="control-label">Email address</label>
    	<input type='text' name='email' class="form-control" required autofocus placeholder="mail@domain.ext">
	</div>

	<div class="form-group">
  	   	<label for="password" class="control-label">Password</label>
    	<input type='password' name='password' class="form-control" required>
	</div>
    <input type='submit' value='Log in' class="btn btn-lg btn-primary btn-block">
</form>
