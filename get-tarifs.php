<?php
define("TARIFS_URL", "http://sknt.ru/job/frontend/data.json");
header("Access-Control-Allow-Origin: *");

$opts = array(
  'http' => array(
    'method'=>"GET"
  )
);

$context = stream_context_create($opts);

$response = @file_get_contents(TARIFS_URL, false, $context);
if ($response === FALSE) {
  http_response_code(404);
  echo "Not found";
}
else {
  header('Content-type:application/json;charset=utf-8');
  echo $response;
}
?>