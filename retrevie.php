<?php
$url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?limit=20";
$response= file_get_contents($url);
$result= json_decode($response,true);

 ?>  

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment2</title> 
<style>
    :root {
    --white: #FDF0D5;
    --red1: #C1121F;
    --red2: #780000;
    --blue: #003049;
    --blue2:#669BBC ;
}  

body{
    background-color : var(--white);

} 
table {
 background-color : var(--white);
 border: var(#669BBC) 20px;
}

tr { 
background-color: var(--red1);
color : white ; 
} 

td{
    background-color: var(--red2);
    color : white ; 
} 

</style>
</head>
<body>
<div class="overflow-auto">
<table>
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Semester</th>
      <th scope="col">Programs</th>
      <th scope="col">Nationality</th>
      <th scope="col">College</th>
      <th scope="col">No. of students</th>
    </tr>
  </thead>
  <tbody> 
    <?php 
    if (isset($result['results']) && is_array($result['results'])) {
        foreach($result['results'] as $record){
            echo"<tr>";
            echo"<td>" . htmlspecialchars($record['year']) . "</td>" ;
            echo"<td>" . htmlspecialchars($record['semester']) . "</td>" ;
            echo"<td>" . htmlspecialchars($record['the_programs']) . "</td>" ;
            echo"<td>" . htmlspecialchars($record['nationality']) . "</td>" ;
            echo"<td>" . htmlspecialchars($record['colleges']) . "</td>" ;
            echo"<td>" . htmlspecialchars($record['number_of_students']) . "</td>" ;
            echo"</tr>";

        }
    } 
    else {
        echo "<tr><td colspan='6'> no data available </td></tr>" ;
    }
    ?>
  </tbody>
</table>
</div>
    
</body> 

</html> 