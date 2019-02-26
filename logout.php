<?php
session_start();
if(session_destroy())
{
echo "<script>";
echo "history.go(-1)";
echo "</script>";
}
?>