<!-- como se hace una llamada a una API -->
<?php
    const API_URL = "https://www.whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesion de curl
    $ch = curl_init(API_URL);
    //Indicar que queremos recibir el resultado de la petición y no mostrarla en
    //pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    /**ejecutar la peticion y guardar el resultado*/
    $res = curl_exec($ch);
    $data = json_decode($res,true);
    curl_close($ch);

?>

<head>
    <title>La próxima película de Marvel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport --> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section style="background-color: #ececec; padding: 5px; border-radius: 20px;">
       <div style="text-align: center;">
       <img src="<?= $data["poster_url"] ?>" width="300" alt="Poster de <?= $data["title"]?>" style="border-radius: 30px;">
        <h2>La próxima película de Marvel</h2>
       </div>
    </section>

    <hgroup style="text-align: center;">
        <h2> <?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h2>
        <p> Fecha de estreno:  <?= $data["release_date"] ?></p>
        <p> La siguiente es:  <?= $data["following_production"]["title"] ?></p>
    
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
</style>