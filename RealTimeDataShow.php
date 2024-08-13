<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Real Time Data Display</title>
</head>

<body onload="table();">

  <div id="table">
    <?php
    require_once ('Dao/FamilyDao.php');
    $familyDao = new FamilyDao();
    $family = $familyDao->getAll();
    ?>
    <table border=1 cellpadding=10>
      <tr>
        <td>#</td>
        <td>First Name</td>
        <td>Home Town</td>
        <td>Last Name</td>
        <td>Age</td>
        <td>job</td>
      </tr>
      <?php $i = 1; ?>
      <?php foreach ($family as $f): ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td> <?php echo $f->getfirst_name(); ?></td>
          <td> <?php echo $f->getlast_name(); ?></td>
          <td> <?php echo $f->gethometown(); ?></td>
          <td> <?php echo $f->getage(); ?></td>
          <td> <?php echo $f->getjob(); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

</body>

<script type="text/javascript">
  function table() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      document.getElementById("table").innerHTML = this.responseText;
    }
    xhttp.open("GET", "RealTimeDataShow.php");
    xhttp.send();
  }

  setInterval(function () {
    table();
  }, 1);
</script>

</html>