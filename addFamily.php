<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Family Form</title>
</head>

<body>

    <?php
    require_once ('Dao/FamilyDao.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $hometown = $_POST['hometown'];
        $age = $_POST['age'];
        $job = $_POST['job'];

        $fam = new Family('', $first_name, $last_name, $hometown, $age, $job);
        $FamDao = new FamilyDao();
        $result = $FamDao->addFamily($fam);

        if ($result) {
            echo "<script>alert('add successfully.')</script>";
            echo "<script>window.location.href='family.php'</script>";
        } else {
            echo json_encode(['success' => false, 'message' => 'There was an issue adding the family.']);
        }
        exit();
    }
    ?>

    <form id="myForm">
        <fieldset style="width:30%">
            <legend>Add Family Form</legend>
            <div style="padding-top:2%">
                <label>First Name</label>
                <input id="first_name" type="text" name="first_name" required>
            </div>
            <div style="padding-top:2%">
                <label>Last Name</label>
                <input id="last_name" type="text" name="last_name" required>
            </div>
            <div style="padding-top:2%">
                <label>Home Town</label>
                <input id="hometown" type="text" name="hometown" required>
            </div>
            <div style="padding-top:2%">
                <label>Age</label>
                <input id="age" type="number" name="age" required>
            </div>
            <div style="padding-top:2%">
                <label>Job</label>
                <input id="job" type="text" name="job" required>
            </div>
            <div style="padding-top:2%">
                <button type="submit" style="color:white;background-color:green">Submit</button>
            </div>
        </fieldset>
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            var first_name = document.getElementById('first_name').value;
            var last_name = document.getElementById('last_name').value;
            var hometown = document.getElementById('hometown').value;
            var age = document.getElementById('age').value;
            var job = document.getElementById('job').value;

            var data = 'first_name=' + encodeURIComponent(first_name) +
                '&last_name=' + encodeURIComponent(last_name) +
                '&hometown=' + encodeURIComponent(hometown) +
                '&age=' + encodeURIComponent(age) +
                '&job=' + encodeURIComponent(job);
            xhr.send(data);

            if (data){
                console.log('ritik', data);
                window.location.href = 'family.php';
            }else{
                console.log('error');
            }
        });
    </script>

</body>

</html>