<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once ('Dao/FamilyDao.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $FamilyDao = new FamilyDao();
        $result = $FamilyDao->DeleteFamily($id);
        if ($result == true) {
            echo json_encode(['success' => true, 'message' => 'Successfully Deleted.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'There is some issue']);
        }
        exit();
    }
    ?>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        ?>
        <form id="familyForm">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
            <div class="col-12">
                <label for="title" class="form-label">Are you sure you want to delete this Skill?</label>
                <div class="row mb-3">
                    <div class="col-4"><br>
                        <button class="btn btn-primary w-100" type="submit" name="delete">Yes</button>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12"><br>
                            <button type="button" onclick="window.location.href='family.php'">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
    } else {
        echo "You cannot access this page";
    }
    ?>
</body>

<script>
    document.getElementById('familyForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        var id = document.getElementById('id').value;

        var data = 'id=' + encodeURIComponent(id);

        xhr.send(data);
        if (data) {
            console.log('ritik', data);
            window.location.href = 'family.php';
        } else {
            console.log('error');
        }
    });
</script>

</html>