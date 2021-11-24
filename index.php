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
        #################################################
        #$ASN_=
        $City =  $read_city -> city($real_ip);
    ?>
    <div class= "content">
        <div class= "head_ip">
            <p><h1>Your IP is: </h1><p>
            <p><code><h3><?php echo $real_ip ?></h3></code></p>
            </br>
            <p><h2>Information</h2></p>
            <?php
                 print($record->country->isoCode . "\n"); // 'US'
                 print($record->country->name . "\n"); // 'United States'
                 print($record->country->names['zh-CN'] . "\n"); // '美国'
         
                 print($record->mostSpecificSubdivision->name . "\n"); // 'Minnesota'
                 print($record->mostSpecificSubdivision->isoCode . "\n"); // 'MN'
         
                 print($record->city->name . "\n"); // 'Minneapolis'
         
                 print($record->postal->code . "\n"); // '55455'
         
                 print($record->location->latitude . "\n"); // 44.9733
                 print($record->location->longitude . "\n"); // -93.2323
         
                 print($record->traits->network . "\n"); // '128.101.101.101/32'
            ?>
        <di>
    </div>
</body>
</html>