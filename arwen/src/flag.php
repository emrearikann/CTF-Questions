<?php
if (isset($_GET["flag"]) && $_GET["flag"] != "") {
   if (preg_match("/^t........N!?/", $_GET["flag"])) {
      echo json_encode(array(
         "status" => "OK",
         "Message" => "SiberVatan{R3g3x_C0nf!rm3d}",
      ));
      exit;
   }
}

echo json_encode(array(
   "status" => "FAILED",
   "Message" => "Opss."
));
exit;
