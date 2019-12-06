<?php 
require('includes/config.php');

//if not logged in redirect to members page
if( !$user->is_logged_in()){ header('Location:login'); exit(); }
header('Location:profile'); 
exit();
echo " user is loged in";

?>