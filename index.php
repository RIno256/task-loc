<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
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
        $ASN = $read_asn -> asn($real_ip);
        $City =  $read_city -> city($real_ip);
    ?>
    <div class= "content">
        <div class= "head_ip">
            <div class="ip_info">
                <p><h1>Your IP is: </h1><p>
                <p><code><h3><?php echo $real_ip ?></h3></code></p>
            <di>
            <br>
            <div class="main_info">
                <p><h2>Information</h2></p>
            <div>
            <br>
            <div class="table_info">
                <table>
                    <tbody>
                        <tr>
                            <td class="info"><p>IP address<p></td>
                            <td><p><?php print($real_ip . "\n")?><p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Country</p></td>
                            <td><p><?php print($City->country->name . "\n"); ?><p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Country(ISO code)</p></td>
                            <td ><p><?php print($City->country->isoCode . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Region</p></td>
                            <td><p><?php print($City->mostSpecificSubdivision->name . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Region code</p></td>
                            <td><p><?php print($City->mostSpecificSubdivision->isoCode . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>City</p></td>
                            <td><p><?php print($City->city->name . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Latitude</p></td>
                            <td><p><?php print($City->location->latitude . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Longitude</p></td>
                            <td><p><?php print($City->location->longitude . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>ASN</p></td>
                            <td><p><?php print($ASN->autonomousSystemNumber . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>ASN(orgabizatiopn)</p></td>
                            <td><p><?php print($ASN->autonomousSystemOrganization . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"><p>Network</p></td>
                            <td><p><?php print($ASN->network . "\n"); ?></p></td>
                        </tr>
                        <tr>
                            <td class="info"> User agent: RAW</td>
                            <td>
                                <p>
                                    <?php
                                        echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
                                        $browser = get_browser(null, true);
                                        print_r($browser);
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div>
    </div>
</body>
</html>