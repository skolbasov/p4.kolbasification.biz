<?php if(isset($error)): ?>
<div class='error'>
    <?=$error?>
</div>
<br>
<?php endif; ?>

<form method='POST' class="form-signin" action='/users/p_signup' role="form">
    <h2 class="form-signin-heading">Please sign in</h2>
    <div class="form-group">
        <label for='first_name' class="control-label">First name</label>
        <input type='text' name='first_name' autocomplete="on" placeholder="First name" required class="form-control">
    </div>
    <div class="form-group">
        <label for='last_name' class="control-label">Last name</label>
        <input type='text' name='last_name' autocomplete="on" placeholder="Last name" required class="form-control">
    </div> 
    <div class="form-group">
        <label for='email' class="control-label">Email</label>
        <input type='email' name='email' autocomplete="on" placeholder="mail@domain.ext" required class="form-control">
    </div>
    <div class="form-group">
        <label for='password' class="control-label">Password</label>
        <input type='password' name='password' required class="form-control">
        <input type='hidden' name='timezone_name' id='timezone_name'>
        <input type='hidden' name='timezone_value' id='timezone_value'>
    </div>
    <script>
        var x = new Date();
        var currentTimeZoneOffsetInHours = x.getTimezoneOffset();
        var x=new Date().toString().match(/([-\+][0-9]+)\s/)[1];
        $('#timezone_name').val(jstz.determine().name());
        $('#timezone_value').val(x);
    </script>
    <input type='submit' value='Sign up' class="btn btn-primary btn-block">
</form>




