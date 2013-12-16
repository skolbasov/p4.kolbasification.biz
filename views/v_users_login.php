

<form method='POST' action='/users/p_login'>

<?php if(isset($error)): ?>
<div class='error'>
	Login failed. Please check your email for the activation link. Please double check entered email and password. 
</div>
<br>
<?php endif; ?>


    Email<br>
    <input type='text' name='email' class="InputField">

    <br><br>

    Password<br>
    <input type='password' name='password' class="InputField">
    <br><br>

    <input type='submit' value='Log in' class="InputButton">

</form>