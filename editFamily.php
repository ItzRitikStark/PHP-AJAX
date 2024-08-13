<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Family Form</title>
</head>

<body>
    <!-- ############################# START EDIT AJAX CODE HERE ################################  -->
    <?php
    require_once ('Dao/FamilyDao.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $hometown = $_POST['hometown'];
        $age = $_POST['age'];
        $job = $_POST['job'];

        $Family = new Family($id, $first_name, $last_name, $hometown, $age, $job);
        $FamilyDao = new FamilyDao();
        $result = $FamilyDao->UpdateFamily($Family);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Family Updated.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'There is some issue.']);
        }
        exit();
    }
    ?>
    <!-- ############################# END EDIT AJAX CODE HERE ################################  -->
    <?php
    require_once ('Dao/FamilyDao.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $familyDao = new FamilyDao();
        $Family = $familyDao->viewFamily($id);

        if ($Family) {
            $Family = $Family[0];
        } else {
            echo "<p>No data available.</p>";
        }
    } else {
        echo "<p>No ID provided.</p>";
    }
    ?>
    <form id="myForm">
        <fieldset style="width:30%">
            <legend>Edit Family Form</legend>
            <input type="hidden" id="id" value="<?php echo $Family->getid(); ?>" name="id" required>
            <div style="padding-top:2%">
                <label>First Name</label>
                <input type="text" id="first_name" value="<?php echo $Family->getfirst_name(); ?>" name="first_name"
                    required>
            </div>
            <div style="padding-top:2%">
                <label>Last Name</label>
                <input type="text" id="last_name" value="<?php echo $Family->getlast_name(); ?>" name="last_name"
                    required>
            </div>
            <div style="padding-top:2%">
                <label>Home Town</label>
                <input type="text" id="hometown" value="<?php echo $Family->gethometown(); ?>" name="hometown" required>
            </div>
            <div style="padding-top:2%">
                <label>Age</label>
                <input type="number" id="age" value="<?php echo $Family->getage(); ?>" name="age" required>
            </div>
            <div style="padding-top:2%">
                <label>Job</label>
                <input type="text" id="job" value="<?php echo $Family->getjob(); ?>" name="job" required>
            </div>
            <div style="padding-top:2%">
                <button type="submit" name="submit" style="color:white;background-color:green">Submit</button>
            </div>
        </fieldset>
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            var id = document.getElementById('id').value;
            var first_name = document.getElementById('first_name').value;
            var last_name = document.getElementById('last_name').value;
            var hometown = document.getElementById('hometown').value;
            var age = document.getElementById('age').value;
            var job = document.getElementById('job').value;

            var data = 'id=' + encodeURIComponent(id) +
                '&first_name=' + encodeURIComponent(first_name) +
                '&last_name=' + encodeURIComponent(last_name) +
                '&hometown=' + encodeURIComponent(hometown) +
                '&age=' + encodeURIComponent(age) +
                '&job=' + encodeURIComponent(job);

            // Send the request
            xhr.send(data);
            if (data) {
                console.log('ritik', data);
                window.location.href = 'family.php';
            } else {
                console.log('error');
            }
        });
    </script>

</body>

</html>