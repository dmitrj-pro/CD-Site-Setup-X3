<?php
include 'header.php';
include 'conf.php';
include system.'/index.php';

setcookie("token","123");
SSKernel::Init($params);

include template.'/'.$template.'/index.php';
 ?>
