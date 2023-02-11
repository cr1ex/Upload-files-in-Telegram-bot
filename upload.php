<?php
  if (isset($_FILES['fileToUpload'])) {
    $token = "yourbottoken";
    $chat_id = "yourchatid";
    
    $file = $_FILES['fileToUpload'];
    $file_path = $file['tmp_name'];
    $file_name = $file['name'];
    
    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.telegram.org/bot$token/sendDocument",
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => [
        'chat_id' => $chat_id,
        'document' => curl_file_create($file_path, 'application/octet-stream', $file_name)
      ],
      CURLOPT_RETURNTRANSFER => true
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
  }
?>
