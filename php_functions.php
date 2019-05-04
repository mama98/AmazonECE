<?php
function alert($alert_msg) {
  echo "<script type=\"text/javascript\">";
  echo "alert('". $alert_msg ."');";
  echo "</script>";
}

function alert_and_redirect($alert_msg, $header) {
  echo "<script type=\"text/javascript\">";
  echo "alert('$alert_msg');";
	echo "location = \"$header\"";
  echo "</script>";
}
?>
