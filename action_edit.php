<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
if($db){
   echo "OK";
}
if($_GET["waiting"]){
   $waiting = $_GET["waiting"];  
   $update = $db->update("patient", [
   "waiting" => "$waiting"
]);
}
if($_GET["call"]){
          $call = $_GET["call"]; 
          $update = $db->update("patient", [
   "call" => "$call"
]);
       $delete = $db->delete("26 May", $call);
}      
header('Location: index.php');