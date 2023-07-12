<?php define("APO", true); ?>
<?php define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT']) ?>
<?php require(ROOT_DIR . "/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Boilerplate -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title><?php echo APO_TITLE ?></title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Additional CSS -->
    <style>
        body {
            /* Use a modern background color */
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-center">
        <div class="w3-margin w3-padding w3-border w3-border-black">
            <!-- Echo the site's domain -->
            <h2><?php echo SITE_NAME; ?></h2>
        </div>
        <h1><?php echo APO_HEADER ?></h1>
        <div class="w3-row">
            <?php
                foreach(OPTIONS as $option) {
                    // Variables
                    $url = $option['url'];
                    $title = $option['title'];
                    $description = $option['description'];

                    // Check if the URL is valid
                    if(!filter_var($url, FILTER_VALIDATE_URL)) {
                        continue;
                    }

                    // Check if the website is online or not using cURL
                    // If the website redirects you, make sure to keep the CURLOPT_FOLLOWLOCATION on
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_NOBODY, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    $color = 'w3-red';
                    $status = APO_STATUS_OFFLINE;
                    // Set the color of the button
                    if($httpCode == 200 || $httpCode == 302 || $httpCode == 301 || $httpCode == 307 || $httpCode == 308 || $httpCode == 401 || $httpCode == 403 || $httpCode == 404 || $httpCode == 405 || $httpCode == 406 || $httpCode == 407 || $httpCode == 408 || $httpCode == 409 || $httpCode == 410 || $httpCode == 411 || $httpCode == 412 || $httpCode == 413 || $httpCode == 414 || $httpCode == 415 || $httpCode == 416 || $httpCode == 417 || $httpCode == 418 || $httpCode == 421 || $httpCode == 422 || $httpCode == 423 || $httpCode == 424 || $httpCode == 425 || $httpCode == 426 || $httpCode == 428 || $httpCode == 429 || $httpCode == 431 || $httpCode == 451 || $httpCode == 500 || $httpCode == 501 || $httpCode == 502 || $httpCode == 503 || $httpCode == 504 || $httpCode == 505 || $httpCode == 506 || $httpCode == 507 || $httpCode == 508 || $httpCode == 510 || $httpCode == 511 || $httpCode == 520 || $httpCode == 521 || $httpCode == 522 || $httpCode == 523 || $httpCode == 524 || $httpCode == 525 || $httpCode == 526 || $httpCode == 527 || $httpCode == 530 || $httpCode == 598 || $httpCode == 599) {
                        $color = 'w3-blue';
                        $status = APO_STATUS_ONLINE;
                    }

                    // Create nice looking buttons
                    echo "<div class='w3-half' title='$description ($status)'>";
                    echo "<a href='$url'>";
                    echo "<div class='w3-margin w3-button $color w3-border w3-border-black' style='width:95%;'>";
                    echo "<h3 class='w3-text-black'>$title</h3>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            ?>
        </div>
        <?php
        
        // Check if the user is logged in
        if(AUTH_ENABLED == true && isset($_SESSION['logged_in'])) {
            logout_button();
        }
        
        ?>
        <div class="w3-margin w3-padding w3-border w3-border-black">
            <!-- About Site -->
            <p><?php echo APO_ABOUT ?></p>
        </div>
        <div class="w3-margin w3-padding w3-border w3-border-black">
            <p>© <?php echo date("Y") ?> <?php echo COPYRIGHT ?></p>
        </div>
        <div class="w3-margin w3-padding w3-border w3-border-black">
            <p><?php echo APO_POWEREDBY ?> <?php echo CREDITS ?></p>
        </div>
    </div>
</body>
</html>