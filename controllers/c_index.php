<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {


		if(!$this->user){
			$this->template->content = View::instance('v_index_index');
			$this->template->title = "Welcome!";
			echo $this->template;
		}

else {
	$this->template->content=View::instance('v_posts_index');
	$this->template->title="All my posts";
	$q='SELECT posts.post_id, posts.content, posts.created, posts.title, posts.likes, posts.user_id AS post_user_id, users.first_name, users.last_name
	FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE posts.user_id ='.$this->user->user_id;
	$posts=DB::instance(DB_NAME)->select_rows($q);
	$this->template->content->posts=$posts;
	echo $this->template;
}

	} # End of method
	
	
} # End of class
