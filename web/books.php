
<html>

<body>
    <?php
    try {
        // default Heroku Postgres configuration URL
        $dbUrl = getenv('DATABASE_URL');

        /*if (empty($dbUrl)) {
        // example localhost configuration URL with postgres username and a database called cs313db
        $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
        }*/

        $dbopts = parse_url($dbUrl);
        
        $dbHost = $dbopts["host"];
        echo $dbHost;
        $dbPort = $dbopts["port"];
        echo $dbPort;
        $dbUser = $dbopts["user"];
        echo $dbUser;
        $dbPassword = $dbopts["pass"];
        echo $dbPassword;
        $dbName = ltrim($dbopts["path"],'/');
        echo $dbName;
        
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    ?>
  <h1>Thanks for your purchase</h1>
  <p> Items </p>
  
</body>

</html>