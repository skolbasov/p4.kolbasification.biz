<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) {echo $title;} else {echo "Time management tool";} ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<link rel="stylesheet" href="/css/main.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script type="text/javascript" src="/js/jstz.js"></script>
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

	
</head>

<body>	

<div id='menu'>
<?php if ($user):?>

<a href='/events/display' class="nav-item">Add an event</a>
<a href='/events/displaySchedule' class="nav-item">Schedule</a>
<a href='/users/profile' class="nav-item">Profile</a>
<a href='/users/logout' class="nav-item">Logout</a>
<?php else: ?> 
<a href='/' class="nav-item">Home</a>
<a href='/users/signup' class="nav-item">Sign up</a>
<a href='/users/login' class="nav-item">Log in</a>
<?php endif; ?>

</div>

<br>

	<?php if(isset($content)) echo $content; ?>
		<script type="text/javascript" src="/js/timeManagement.js"></script>	
</body>
</html>