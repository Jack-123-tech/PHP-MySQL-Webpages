<html>
    <head><title>New Sport</title></head>
   <body>
    <form method="POST" action=Sports.php?action=add>
<fieldset>
    <legend>Enter a New Sport</legend>
    SportID <input type="text"name=SportID><br>
    Sport: <input type="text" name="Sport_Name"><br>
    <form action="/action_page.php">
  <p> Indoor or outdoor Sport</p>
  <input type="radio" id="indoor" name="Indoor_or_outdoor" value="Indoor">
<label for="indor">Indoor</label>
  <input type="radio" id="outdoor" name="Indoor_or_outdoor" value="Outdoor" >

<label for="outdoor">Outdoor</label><br>
<input type="submit" value="Add Sport"><br>


<?php echo $message; ?><br>
<a href="Sports.php?action=list">Sport List</a><br>
<a href="../Homepage.php">Home</a>
</fieldset>

    </form>
   </body>
</html>