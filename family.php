<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- ##########################################  start Example 2 ####################################################### -->
<?php
require_once ('Dao/FamilyDao.php');

$familyDao = new FamilyDao();
$family = $familyDao->getAllName();
?>

<form>
  <select name="users" onchange="showUser(this.value)">
    <option value="">Select a person:</option>
    <?php foreach ($family as $person){ ?>
      <option value="<?php echo $person->getId()  ?>">
      <?php echo $person->getfirst_name() . ' ' . $person->getlast_name(); ?>
      </option>
    <?php }?>
  </select>
</form>

<div  id="txtHint"><b>Person info will be listed here...</b></div>


<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","AJAX/family.php?id="+str,true);
    xmlhttp.send();
  }
}
</script>
</body>
</html>