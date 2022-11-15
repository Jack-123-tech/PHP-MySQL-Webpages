<html>
<title>Student Sport Intrest</title>
<head>
    <body>
       <table border="1">
       <tr><th>Sport Name</th><th>Active type </th><th>Student</th></tr>
<?php
 foreach($Sports_list as $Sports ){
print<<<_STUDENT
<tr><td>$Sports[Sport_Name]</td>
        <td>$Sports[Indoor_or_outdoor]</td>
        <td><a href=..\Sport_regtrsion\Registration.php?action=listStudentRegistrations&ID=$Sports[SportID]>List</a></td>

        </tr>

_STUDENT;
 }
 
?>
 <a href="Sports.php?action=new">New</a><br>
    <a href="../Homepage.php">Home</a>
</table> 

</body>
</head>
</html>