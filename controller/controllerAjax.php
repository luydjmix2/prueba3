<?php

/*
 * en este punto gestionaremos los llamados de ajax desde js
 */
include_once './ajaxWS.php';

$ajaxWSClass = new ajaxWS();
//echo 'ok';
switch ($_POST['paso']) {
    case 'paso1':
//        echo 'hola paso 1';
        $ajaxWSClass->login();
        break;
    case 'paso2':
//        echo 'hola paso 2';
        $ajaxWSClass->query($_POST['sesion']);
        break;

    default:
        break;
}
?>

