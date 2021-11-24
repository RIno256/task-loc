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
        $ASN = $read_asn->asn($real_ip);
        $City =  $read_city -> city($real_ip);
    ?>
    <div class= "content">
        <div class= "head_ip">
            <p><h1>Your IP is: </h1><p>
            <p><code><h3><?php echo $real_ip ?></h3></code></p>
            </br>
            <p><h2>Information</h2></p>
            <?php
                print($City->country->isoCode . "\n"); // 'US'
                print($City->country->name . "\n"); // 'United States'
                print($City->country->names['en-EN'] . "\n"); // '美国'

                print($City->mostSpecificSubdivision->name . "\n"); // 'Minnesota'
                print($City->mostSpecificSubdivision->isoCode . "\n"); // 'MN'
 
                print($City->city->name . "\n"); // 'Minneapolis'

                print($City->postal->code . "\n"); // '55455'

                print($City->location->latitude . "\n"); // 44.9733
                print($City->location->longitude . "\n"); // -93.2323

                print($City->traits->network . "\n"); // '128.101.101.101/32'
                 
                print($ASN->autonomous_system_number. "\n");

            ?>
        <div>
    </div>
</body>
</html>