<?php if(isset($error)): ?>
<div class='error'>
    <?=$error?>
</div>
<br>
<?php endif; ?>

<form method='POST' action='/users/p_signup'>

    <label for='first_name'>First name</label><br>
    <input type='text' name='first_name' autocomplete="on" placeholder="First name" required class="InputField">
    <br><br>

    <label for='last_name'>Last name</label><br>
    <input type='text' name='last_name' autocomplete="on" placeholder="Last name" required class="InputField">
    <br><br>

    Email<br>
    <input type='email' name='email' autocomplete="on" placeholder="mail@domain.ext" required class="InputField">
    <br><br>

    Password<br>
    <input type='password' name='password' required class="InputField">
    <br><br>    
    
    <input type='hidden' name='timezone_name' id='timezone_name'>
     <input type='hidden' name='timezone_value' id='timezone_value'>

         <script>
var x = new Date();
var currentTimeZoneOffsetInHours = x.getTimezoneOffset();

var x=new Date().toString().match(/([-\+][0-9]+)\s/)[1];

    $('#timezone_name').val(jstz.determine().name());
       $('#timezone_value').val(x);
</script>

    <input type='submit' value='Sign up' class="InputButton">

</form>




