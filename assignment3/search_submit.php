<!DOCTYPE html>
<html>
<head>
<title>Table with data</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

th {
  background-color: #4CAF50;
  color: white;
  border-bottom: 2px solid #ddd;
}
</style>
</head>

<body>
<br>
<h3>Your search result</h3>

<?php include ("config.inc.php")?>

<?php
$text=$_POST['txt'];
$search=$_POST['search'];

// Attempt select query execution
if($search == 'ID') # for gene
{
  $sql="SELECT * FROM `dataset` WHERE `ID` like '$text'"; #mysql_query
}
if($search == 'Sequence_Source') # for location
{
  $sql="SELECT * FROM `dataset` WHERE `SEQ_SOURCE` like '$text'"; #mysql_query
}
if($search == 'GENE_SYMBOL') # for Chr
{
  $sql="SELECT * FROM `dataset` WHERE `GENE_SYMBOL` like '$text'"; #mysql_query
}
if($search == 'enterz') # for Chr
{
  $sql="SELECT * FROM `dataset` WHERE `ENTREZ_GENE_ID` like '$text'"; #mysql_query
}
if($search == 'expression') # for Chr
{
  $sql="SELECT * FROM `dataset` WHERE `EXPRESSION` like '$text'"; #mysql_query
}

if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>SEQ_SOURCE</th>";
    echo "<th>GENE_SYMBOL</th>";
    echo "<th>ENTREZ_GENE_ID</th>";
    echo "<th>EXPRESSION</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['SEQ_SOURCE'] . "</td>";
      echo "<td>" . $row['GENE_SYMBOL'] . "</td>";
      echo "<td>" . $row['ENTREZ_GENE_ID'] . "</td>";
      echo "<td>" . $row['EXPRESSION'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    // Close result set
    mysqli_free_result($result);
  } else{
    echo "No records matching your query were found.";
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
</body>
</html>


