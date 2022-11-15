<html>
    <head>
        <title>Sport Intrest list  </title>
        <body>
        <table border="1">
<tr><th>First Name</th><th>Last Name</th><th>Sport Name </th><th>Sports Intrest</th></tr>
<?php
foreach($Intrest_list as $Intrest){
   print<<<_Intrest
   <tr>
   <td>$Inrest[firstName]</td>
   <td>$Intrest[lastName]</td>
   <td>$Inrest[SportName]</td>
   <td>$Inrest[SportsIntrest]</td>
   <td> 
   
</tr>
_Intrest;
}
 


?>

</table>
<a href="Registration.php?action=new">New</a><br>
    <a href="../Homepage.php">Home</a>
        </body>
    </head>
</html>