<?php
// Credenciais para uso da API
$CLIENT_ID = "FREE_TRIAL_ACCOUNT";
$CLIENT_SECRET = "PUBLIC_SECRET";

// Verificação e valição do texto
if(isset($_GET['texto'])) {
    $texto = $_GET['texto'];
} else {
    $texto = "Olá, caso queria personalizar o texto basta envia-lo via URL";
}

// Dados a serem passados para a API
$postData = array(
  'fromLang' => "pt",
  'toLang' => "en",
  'text' => $texto
);

// Headers
$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);

$url = 'http://api.whatsmate.net/v1/translation/translate';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);

echo "<b>Original: </b> " . $texto;
echo "<br><br>";    
echo "<b>Tradução:</b> ".$response;
curl_close($ch);
?>
