<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) {echo $title;} else {echo "Time management tool";} ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

	<link rel="stylesheet" href="/css/bootstrap.css">

	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/print.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script type="text/javascript" src="/js/jstz.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

	
</head>

<body>	
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
        	<a class="navbar-brand" href="/">Eisenhower</a>
        	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
           		<span class="icon-bar"></span>
          	</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if ($user):?>
					<li><a href='/events/display'>Add an event</a></li>
					<li><a href='/events/displaySchedule'>Schedule</a></li>
					<li><a href='/users/profile'>Profile</a></li>
					<?php else: ?> 
					<li><a href='/users/signup'>Sign up</a></li>
					<?php endif; ?>
 				</ul>
 				<ul class="nav navbar-nav navbar-right">
					<?php if ($user):?>
					<li><a href='/users/logout'>Logout</a></li>
					<?php else: ?> 
					<li><a href='/users/login'>Log in</a></li>
					<?php endif; ?>
				</ul>
 			</div>
		</div>
</div>	

<div class="container">
	<?php if(isset($content)) echo $content; ?>
</div>
		<script type="text/javascript" src="/js/timeManagement.js"></script>	
</body>
</html>