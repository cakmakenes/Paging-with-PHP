<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        h1{text-align: center;}
      table{ margin: 10px auto; border-collapse: collapse;}
      td,th{ border-bottom: 1px solid #AAA; padding: 8px; text-align: left;}
      div{ text-align: center;}
</style>
<body>
    
    <?php 
        require "./db.php" ;
        $code = $_GET["code"];
        $page = $_GET["page"];
        foreach($countries as $count){
            if($count["code"]===$code) 
            $cntName= $count["name"];
        }
    ?>
    <h1>Cities of <?= $cntName ?></h1>

      <table>
        <tr>
            <th>City Name</th>
            <th>Population</th>
        </tr>

      <?php
    foreach($cities as $ct){
            if($ct["code"]=== $code){
                echo "<tr>";
                echo "<td>{$ct['name']}</td>" ;
                echo "<td>{$ct['population']}</td>";
                echo "</tr>";
            }
        }

        ?>
        </table>

        <div><p> <a href="./countries.php?page=<?=$page?>"> Go to the main page</a></p></div>
</body>
</html>