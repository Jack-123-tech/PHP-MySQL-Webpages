<html>
<head><title>New Sport Intrest Registration</title></head>
<body>
<form method=POST action=registrations.php?action=add>
<fieldset>
    <legend>Enter Registration Info</legend>
    Student: 
    <SELECT name="studentID"> 
    <?php
      foreach ($students as $student) {
        print <<<__DATA
           <option value = $student[studentID]>$student[lastName], $student[firstName]  </option>
__DATA;
      }
    ?>
    </SELECT>
    </br>
    Sport:
    <SELECT name="SportID"> 
    <?php
      foreach ($Sports as $Sport) {
        print <<<__DATA2
           <option value = $Sports[SportID]>$Sports[SportID] $Sports[description] </option>
__DATA2;
      }
    ?>
    </SELECT>
    </br>
    <input type="submit" value="Add Registration">
</fieldset>
</form>
<?php echo $message; ?>
<hr>
<a href=Registration.php?action=listAll>Sport Registrations</a>
</body>
</html>