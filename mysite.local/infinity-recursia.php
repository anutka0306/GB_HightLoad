<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function req(){
   echo 1;
   req();
}

req();
