<?php ob_start(); session_start(); 
	require_once('config.php');
	function getAdminHeader(){
		require_once('includes/header.php');	
	}
	function getAdminSidebar(){
		require_once('includes/sidebar.php');	 
	}
	function getBreadcrum(){
		include_once('includes/breadcrum.php');	
	}
	function getAdminPart($addSection){
		include_once('includes/'.$addSection);	
	}
	function getAdminFooter(){
		require_once('includes/footer.php');	
	}
	//login function
	function isLogIn(){
		return !empty($_SESSION['user']) ? true:false; 
		//true hole return korbe , false holy return korbena
	}
	function needLogIn(){
		$isLogIn = isLogIn(); //function call
		if(!$isLogIn){ //if not login
			header('Location: login.php');
			exit();
		}
	}

function storage ($dir = null){
	if ( $dir ){
	    return realpath(dirname(getcwd())).'/storage/'. $dir;
    }
    return realpath(dirname(getcwd())).'/storage';
}


	function dd($data){
	    echo '<pre>';
	    print_r($data);
	    echo '</pre>';
	    die();
    }
?>