<!DOCTYPE html>
<html lan='en'>
<head> <meta charset="UTF-8">
<title> pdo connection test</title>
</head>

<body>
<?php 
    $dsn = "mysql:dbname=cars; charset=utf8";
    $username = "root";
    $password = "";
    
    
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT * FROM fords";
    
    try {
        
        echo "<table cellspacing='20'>";     
        echo "<tr><th>id</th><th>model</th><th>color</th><th>doors</th></tr>"; 
   
        $rows = $conn->query( $sql );      // get the collection of rows 
        foreach ( $rows as $row ) { 
            echo "<tr>"; 
            echo "<td>" . $row['id'] . "</td> <td> {$row['model']}</td>"; 
            echo "<td> {$row['color']} </td> <td> {$row['doors']} </td>" ; 
            echo "</tr>"; 
        }
    } catch (PDOException $e ) {
        echo "Query failed: " . $e->getMessage();
    }
    
    echo "</table>";
    $conn = null; //close the connection
    ?>
</body> </html>