<?php
require_once ('../Dao/FamilyDao.php');
$id = intval($_GET['id']);
$familyDao = new FamilyDao();
$family = $familyDao->viewFamily($id);
?>


<div>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Home Town</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Action</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (isset($family)) {
                foreach ($family as $f) {
                    ?>
                    <tr>

                        <th scope="row">
                            <?php echo $f->getId() ?>
                        </th>

                        <td>
                            <?php echo $f->getfirst_name(); ?>
                        </td>
                        <td>
                            <?php echo $f->getlast_name(); ?>
                        </td>
                        <td>
                            <?php echo $f->gethometown(); ?>
                        </td>
                        <td>
                            <?php echo $f->getage(); ?>
                        </td>
                        <td>
                            <?php echo $f->getjob(); ?>
                        </td>
                        <td>
                            <button onclick="window.location.href='editFamily.php?id=<?php echo $f->getId(); ?>'">Edit</button>
                        </td>

                        <td>
                            <button onclick="window.location.href='deleteFamily.php?id=<?php echo $f->getId(); ?>'">Delete</button>
                        </td>


                    </tr>

                    <?php

                }
            } else {
                echo "<b>Family are not Displayed</b>";
            }
            ?>
        </tbody>
    </table>
</div>