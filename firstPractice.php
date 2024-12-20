<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

//Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutar la peticion y guardar el resultado 
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

/*Una alternativa seria usando file_get_contents
$result = file_get_contets(API_URL);
Si solo queremos hacer el get de una API */
//var_dump($data);
?>

<head>
    <title>The next Marvel movie</title>
    <meta name="description" content="The next Marvel movie"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Centered viewport -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>

<main>
    <!--<pre style="font-size: 8px; overflow: scroll; height:250px;">
        <?php var_dump($data)?>
    </pre>-->
    <section>
        <img 
        src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px;"
         />
    </section>

    <hgroup> 
        <h2><?= $data["title"]?> release on <?=$data["release_date"];?></h2>
        <p>Description: <?= $data["overview"]; ?></p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>