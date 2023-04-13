<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{ margin: 10px auto; border-collapse: collapse;}
        td,th{ border-bottom: 1px solid #AAA; padding: 8px; text-align: left;}
        .page{margin-top: 30px;text-align:center;}
        span{background-color: lime;}
        a{text-decoration: none;}
    </style>
</head>
<body>
    
<table>
    <tr>
        <th>Country</th>
        <th>Area</th>
        <th>Population</th>
        <th>Capital</th>
    </tr>
<?php

    require_once "./db.php";

    $page =($_GET["page"]) ?? 1 ;

    const PAGESIZE=10;
    $size = count($countries);
    $totalPage= ceil($size / PAGESIZE);
    
    $start = ($page - 1) * PAGESIZE ;
    
    $end = $start + PAGESIZE ; 
    $end = $end > $size ? $size : $end ;
    

    for($i=$start ; $i<$end ; $i++){
        $country=$countries[$i] ;
        $cityId = $country["capital"] ;
        $capital = $cityId === "" ? "" : $cities[$cityId]["name"];
        echo "<tr>";
        
        echo "<td><a href='cities.php?code={$country['code']}&page=$page'>{$country['name']}</a></td><td>{$country['area']}</td><td>{$country['population']}</td><td>$capital</td>";
        
        echo "</tr>";
    }



?>

</table>


<div class="page">[
        <?php
            for($i=1;$i<=$totalPage;$i++){
                if($i == $page){
                    echo "<span> $i </span>";
                }else{
                    echo "<a href='countries.php?page=$i'>  $i  </a>";
                }
                
            }
          
        ?>
    ]
</div>

</body>
</html>