<?php
function obtenerClima($ciudad) {
    $apiKey = 'TU_API_KEY';
    $url = "http://api.openweathermap.org/data/2.5/weather?q={$ciudad}&appid={$apiKey}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($ch);
    curl_close($ch);

    return json_decode($respuesta, true);
}

$ciudad = "Mexico";
$clima = obtenerClima($ciudad);
echo json_encode($clima);
?>
