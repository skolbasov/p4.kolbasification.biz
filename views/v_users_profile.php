<h1>This is the profile of <?=$user->email?></h1>


First name: <?=htmlentities($user->first_name, ENT_QUOTES, 'UTF-8')?><br>
Last name: <?=htmlentities($user->last_name, ENT_QUOTES, 'UTF-8')?><br>

<button id="googleSync" class="btn btn-primary">Pull events from google calendar</button>
<button id="authorize-button" class="btn-danger">Authorize with google id first</button>
<div id="syncStat" class="has-success"></div>