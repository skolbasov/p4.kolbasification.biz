<?php
class practice_controller extends base_controller {

public function __construct(){
        parent::__construct();
        echo "practice_controller construct called<br><br>";
}

public function testdb(){
# Our SQL command
$q = "DELETE FROM users
    WHERE email = 'seaborn@whitehouse.gov'";

# Run the command
echo DB::instance(DB_NAME)->query($q);
}

public function sendmail(){
			$to[]=Array("name"=>"Sergey", "email"=>"skolbasov@yandex.ru");
				$from[]=Array("name"=>APP_NAME, "email"=>APP_EMAIL);
			print_r($to);
			$subject="Confirmation letter";
	
		$body="Dear ". $to['name'] ." this is the confirmation letter of your registration to Sblog";
		$email = Email::send($to, $from, $subject, $body, false, $cc, $bcc);
}

public function gethost(){
	echo $_SERVER['SERVER_NAME'];
}

}