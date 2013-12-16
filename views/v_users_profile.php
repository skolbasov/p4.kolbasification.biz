<h1>This is the profile of <?=$user->email?></h1>


First name <?=htmlentities($user->first_name, ENT_QUOTES, 'UTF-8')?><br>
Last name <?=htmlentities($user->last_name, ENT_QUOTES, 'UTF-8')?><br>