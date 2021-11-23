<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP address information</title>
</head>
<body>
    <?php
        require_once 'vendor/autoload.php';
        use GeoIp2\Database\Reader;
        $real_ip = "";
        $real_ip = strval($_SERVER['REMOTE_ADDR']);
        #################################################
        $read_city = new Reader('/var/www/task.test/db/GeoLite2-City.mmdb');
        $read_country = new Reader('/var/www/task.test/db/GeoLite2-Country.mmdb');
        $read_asn = new Reader('/var/www/task.test/db/GeoLite2-ASN.mmdb');
        #################################################
        #$ASN_=
        $City =  $read_city -> city($real_ip);
        #$Country_= $read_country -> country($read_ip);
        $isso= $c->country->isoCode;
    ?>
    <div class= "content">
        <div class= "head_ip">
            <p><h1>Your IP is: </h1><p>
            <p><code><h3><?php echo $real_ip ?></h3></code></p>
        <di>
    </div>
</body>
</html>