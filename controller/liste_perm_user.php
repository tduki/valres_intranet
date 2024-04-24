<?php

require_once '../model/connexion.inc.php'; 
require_once '../model/user.inc.php';
require_once '../vue/form_user_perm.php';

$users = getUsersWithPermissions();
renderUserTable($users);

?>
