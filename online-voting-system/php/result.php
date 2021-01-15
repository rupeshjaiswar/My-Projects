<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:rgb(180, 178, 178) ;opacity: 0.7;">
    <h1 style="text-align: center;font-style: italic;"><u>RESULTS</u></h1>

<?php

   echo "<div style=' background-color: rgb(180, 178, 178);opacity: 1.0;'>";
$cn=mysqli_connect("localhost","root","","image") or die("Could not Connect My Sql");
$sql = "select   vote_party, COUNT(*) from vote group by vote_party order by 2 desc";
$result = $cn->query($sql);
if (mysqli_query($cn, $sql)) {
    while($row = $result->fetch_assoc()) {
        echo"<h1 style='text-align: center;font-size: 40px;font-style: italic; opacity: 1.0;'>". $row["vote_party"] .  " ". $row["COUNT(*)"]."</h1>";
}
}
else {
echo "Error: " . $sql . "" . mysqli_error($cn);
}
echo "</div>";

?>
</body>
</html>