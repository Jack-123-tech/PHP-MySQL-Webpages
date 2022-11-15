<html>
<head>
   <title>Student List</title>
<body>

   <table border="1">
<tr><th>StudentID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Sports Intrest</th></tr>
<?php

foreach($students_list as $student){
   print<<<_STUDENT
   <tr><td>$student[StudentID]</td>
   <td>$student[First_Name]</td>
   <td>$student[Last_Name]</td>
   <td>$student[Student_DOB]</td>
   <td><a href=Sport_registrations/Registrations.php?action=listStudentRegistrations&ID=$student[StudentID]>List</a></td>

   <td> 
   
</tr>
_STUDENT;
}
 


?>
 <a href="new_Student.php?action=new">New Student</a><br>
    <a href="../Homepage.php">Home</a>
</table>
</body>

</head>
</html>
