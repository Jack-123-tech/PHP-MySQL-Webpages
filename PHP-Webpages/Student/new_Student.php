<html>
<head><title>New Student</title></head>
<body>
<form method=POST action=Students.php?action=add>
<fieldset>
    <legend>Enter Student Info</legend>
    ID: <input type="text" name="studentID"><br>
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    Student DOB <input type="text" name="DOB"><br>
    <input type="submit" value="Add Student">
</fieldset>

</form>
<?php echo $message ="Student added"; ?>
<hr>
<br>
<a href=Students.php?action=list>Students List</a>
<a href=../Homepage.php>Homepage</a>

</body>
</html>