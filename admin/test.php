<!doctype html>
<html>

<head>
    <title>Update Multiple Selected Records PHP Mysql and Jquery Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include "../config/connect.php";
    $alert = "";
    if (isset($_POST['but_update'])) {
        if (isset($_POST['update'])) {
            foreach ($_POST['update'] as $updateid) {

                $name = $_POST['name_' . $updateid];
                $position = $_POST['position_' . $updateid];
                $office = $_POST['office_' . $updateid];
                $age = $_POST['age_' . $updateid];
                $salary = $_POST['salary_' . $updateid];

                if ($name != '' && $position != '') {
                    $updateUser = "UPDATE employee SET 
                            name='" . $name . "',position='" . $position . "'
                        WHERE id=" . $updateid;
                    $stmt = $conn->prepare($updateUser);
                    $stmt->execute();
                }
            }
            $alert = '<div class="alert alert-success" role="alert">Records successfully updated</div>';
        }
    }
    ?>
    <div class='container'>
        <h1>Update Multiple Selected Records using PHP Mysql and Jquery Ajax</h1>
        <form method='post' action=''><?php echo $alert; ?>
            <p><input type='submit' value='Update Selected Records' class="btn btn-success" name='but_update'></p>
            <table class="table table-bordered">
                <tr style='background: whitesmoke;'>
                    <!-- Check/Uncheck All-->
                    <th><input type='checkbox' id='checkAll'> Check</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Salary</th>
                </tr>
                <?php
                $query = "SELECT * FROM employee order by name asc limit 10";
                $result = $conn->prepare($query);
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $position = $row['position'];
                    $office = $row['office'];
                    $age = $row['age'];
                    $salary = $row['salary'];
                ?>
                    <tr>
                        <td><input type='checkbox' name='update[]' value='<?= $id ?>'></td>
                        <td><input type='text' name='name_<?= $id ?>' value='<?= $name ?>'></td>
                        <td><input type='text' name='position_<?= $id ?>' value='<?= $position ?>'></td>
                        <td><input type='text' name='office_<?= $id ?>' value='<?= $office ?>'></td>
                        <td><input type='text' name='age_<?= $id ?>' value='<?= $age ?>'></td>
                        <td><input type='text' name='salary_<?= $id ?>' value='<?= $salary ?>'></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // Check/Uncheck ALl
            $('#checkAll').change(function() {
                if ($(this).is(':checked')) {
                    $('input[name="update[]"]').prop('checked', true);
                } else {
                    $('input[name="update[]"]').each(function() {
                        $(this).prop('checked', false);
                    });
                }
            });
            // Checkbox click
            $('input[name="update[]"]').click(function() {
                var total_checkboxes = $('input[name="update[]"]').length;
                var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                if (total_checkboxes_checked == total_checkboxes) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
            });
        });
    </script>
</body>

</html>