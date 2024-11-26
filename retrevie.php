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
    --green: #d8e2dc; 
    --pink1: #ffe5d9;
    --pink2: #ffcad4;
    --pink3: #f4acb7;
    --purple: #9d8189;

    --border-radius: 10px;
    --font-family: "Arial", sans-serif;
  }

  body {
    background-color: var(--pink1);
    color: var(--purple);
    font-family: var(--font-family);
    font-size: 16px;
    margin: 0;
    padding: 0;
    line-height: 1.5;
  }

  header {
    background-color: var(--purple);
    color: var(--white);
    padding: 1em;
    text-align: center;
    font-size: 1.8em;
    font-weight: bold;
    border-bottom: 5px solid var(--pink3);
  }

  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: var(--white);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  th, td {
    padding: 15px;
    text-align: left;
  }

  th {
    background-color: var(--pink3);
    color: var(--white);
    font-size: 1.2em;
    text-transform: uppercase;
  }

  tr:nth-child(odd) {
    background-color: var(--pink2);
  }

  tr:nth-child(even) {
    background-color: var(--green);
  }

  tr:hover {
    background-color: var(--pink3);
    color: var(--white);
    cursor: pointer;
  }

  footer {
    margin-top: 20px;
    text-align: center;
    font-size: 0.9em;
    color: var(--purple);
    padding: 10px;
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