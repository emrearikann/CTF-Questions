<?php
if (isset($_GET["flag"]) && $_GET["flag"] != "") {
   if (preg_match("/^t........N!?/", $_GET["flag"])) {
      echo json_encode(array(
         "status" => "OK",
         "Message" => "U2liZXJWYXRhbntSM2czeF9DMG5mIXJtM2R9",
      ));
      exit;
   }
}

echo json_encode(array(
   "status" => "FAILED",
   "Message" => "Opss."
));
exit;
