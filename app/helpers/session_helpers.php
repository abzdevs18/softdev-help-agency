<?php

session_start();

function isLoggedIn(){
	if (isset($_SESSION['uId'])) {
		return true;
	}else{
		return false;
	}
}