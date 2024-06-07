<?php    
	require_once("$_SERVER[DOCUMENT_ROOT]/../db/common.dal.inc.php");
	
	error_reporting(~E_WARNING && ~E_NOTICE);

	$_user_authorized=false;
	$_admin_authorized=false;
	
	if (isset($_REQUEST[session_name()]) || isset($_COOKIE[session_name()])) 
	{	
		session_start();
		//Авторизован как пользователь
		if(md5($_SERVER["REMOTE_ADDR"])==$_SESSION["authorized_ip"]) $_user_authorized=true;
		//Авторизован как администратор		
		if(md5($_SERVER["REMOTE_ADDR"])==$_SESSION["admin_authorized_ip"]) $_admin_authorized=true;
	}
	
	function auth_user($login,$password) {
		
		
		$user_login=_DBEscString($login);
		$user_password=md5(_DBEscString($password));

		if($a=_DBGetQuery("
		SELECT * 
		FROM Users 
		WHERE Login='$user_login' AND Password='$user_password'")) {		
			session_start();
			$_SESSION["authorized_ip"]=md5($_SERVER["REMOTE_ADDR"]);
			$_SESSION["user_info"]=$a;
			return true;
		}
		
		return false;
	}
	
	function user_authorized()
	{
		global $_user_authorized, $_admin_authorized;
		return $_user_authorized || $_admin_authorized;
	}
	
	function user_is_admin()
	{
		global $_user_authorized;
		return ($_user_authorized && ($_SESSION["user_info"]["Role"]==1));
	}
	
	function user_is_employee()
	{	
		global $_user_authorized;
		return ($_user_authorized && ($_SESSION["user_info"]["Role"]==2));
	}
	
	function user_name() {
		return $_SESSION["user_info"]["UserName"];
	}
