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

    Last name<br>
    <input type='text' name='last_name' autocomplete="on" placeholder="Last name" required class="InputField">
    <br><br>

    Email<br>
    <input type='email' name='email' autocomplete="on" placeholder="mail@domain.ext" required class="InputField">
    <br><br>

    Password<br>
    <input type='password' name='password' required class="InputField">
    <br><br>    
    
    <input type='hidden' name='timezone'>

    <input type='submit' value='Sign up' class="InputButton">

</form>

    <script>
    $('input[name='timezone']').val(jstz.determine().name());
</script>

