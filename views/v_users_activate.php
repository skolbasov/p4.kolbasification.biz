<?php if(isset($error)): ?>
<div class='error'>
	Activation failed. Your link is broken or the user is already activated
</div>
<br>
<?php else:?>
<div class='success'>
	Activation completed succesfully.
</div>
<br>
<?php endif; ?>