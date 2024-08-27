<?php
include "header.php";
include "connection.php";
$id = $_GET["id"];
$exam_category = "";
$stmt = mysqli_prepare($link, "SELECT * FROM exam_category WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>ADD QUESTIONS INSIDE <?php echo "<font color='red'>" . $exam_category . "</font>"; ?></h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- for questions that have text -->
                        <form name="form1" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>ADD NEW QUESTIONS with TEXT</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Question Statement</label><input type="text" name="fquestion" placeholder="Add Question here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 01</label><input type="text" name="opt1" placeholder="Add Option 1 here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 02</label><input type="text" name="opt2" placeholder="Add Option 2 here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 03</label><input type="text" name="opt3" placeholder="Add Option 3 here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 04</label><input type="text" name="opt4" placeholder="Add Option 4 here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Answer of Question</label><input type="text" name="answer" placeholder="Add answer of question here" class="form-control"></div>
                                        <div class="form-group"><input class="btn btn-success" type="submit" name="submit1" value="UPDATE QUESTION TO TEST"></div>
                                    </div>
                                </div>
                            </div>



                            <!-- for questions taht have images -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>ADD NEW QUESTIONS with IMAGES</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Question Statement</label><input type="text" name="question" placeholder="Add Question here" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 01</label><input type="file" name="fopt1" class="form-control" style="padding-bottom:10px;"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 02</label><input type="file" name="fopt2" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 03</label><input type="file" name="fopt3" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Add Option 04</label><input type="file" name="fopt4" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Answer of Question</label><input type="file" name="fanswer" class="form-control"></div>
                                        <div class="form-group"><input class="btn btn-success" type="submit" name="submit2" value="UPDATE QUESTION TO TEST"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                            $res = mysqli_query($link, "select * from questions where category='$exam_category' order by question_no asc ");
                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr>";
                                echo "<td>";
                                echo $row["question_no"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["question"];
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt1"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["opt1"]; ?>" height="50" width="50">
                                <?php
                                } else {
                                    echo $row["opt1"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt2"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["opt2"]; ?>" height="50" width="50">
                                <?php
                                } else {
                                    echo $row["opt2"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt3"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["opt3"]; ?>" height="50" width="50">
                                <?php
                                } else {
                                    echo $row["opt3"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt4"], 'opt_images/') !== false) {
                                ?>
                                    <img src="<?php echo $row["opt4"]; ?>" height="50" width="50">
                                <?php
                                } else {
                                    echo $row["opt4"];
                                }
                                echo "</td>";

                                echo "<td>";
                                if (strpos($row["opt4"], 'opt_images/') !== false) {
                                ?>
                                    <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                <?php
                                } else {
                                ?>
                                    <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                <?php
                                }
                                echo "</td>";

                                echo "<td>";
                                ?>
                                <a href="delete_option.php?id=<?php echo $row["id"]; ?>">Delete</a>
                            <?php
                                echo "</td>";

                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- code for submit 1 i.e. text type question -->
<?php
if (isset($_POST["submit1"])) {
    // to update question sequesnce
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    // no record added
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            // This will update our question number
            mysqli_query($link, "update questions set question_no='$loop' where id=$row[id] ");
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions(id,question_no,question,opt1,opt2,opt3,opt4,answer,category) values(NULL,'$loop','$_POST[fquestion]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($link));

?>
    <script type="text/javascript">
        alert("WOW! Question added successfully");
        window.location.href = window.location.href;
    </script>
<?php
}
?>

<!-- code for submit 1 i.e. image type question -->
<?php
if (isset($_POST["submit2"])) {
    // to update question sequesnce
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    // no record added
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            // This will update our question number
            mysqli_query($link, "update questions set question_no='$loop' where id=$row[id] ");
        }
    }
    $loop = $loop + 1;

    $tm = md5((time()));
    $fnm1 = $_FILES["fopt1"]["name"];
    // i have used $.tm as when upload same image it will take different name in database
    $dst1 = "./opt_images/" . $tm . $fnm1;
    $dst_db1 = "opt_images/" . $tm . $fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);


    $fnm2 = $_FILES["fopt2"]["name"];
    $dst2 = "./opt_images/" . $tm . $fnm2;
    $dst_db2 = "opt_images/" . $tm . $fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);


    $fnm3 = $_FILES["fopt3"]["name"];
    $dst3 = "./opt_images/" . $tm . $fnm3;
    $dst_db3 = "opt_images/" . $tm . $fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);


    $fnm4 = $_FILES["fopt4"]["name"];
    $dst4 = "./opt_images/" . $tm . $fnm4;
    $dst_db4 = "opt_images/" . $tm . $fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);


    $fnm5 = $_FILES["fanswer"]["name"];
    $dst5 = "./opt_images/" . $tm . $fnm5;
    $dst_db5 = "opt_images/" . $tm . $fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

    mysqli_query($link, "insert into questions(id,question_no,question,opt1,opt2,opt3,opt4,answer,category) values(NULL,'$loop','$_POST[question]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$exam_category')") or die(mysqli_error($link));

?>
    <script type="text/javascript">
        alert("WOW! Question added successfully");
        window.location.href = window.location.href;
    </script>
<?php
}
?>

<?php include "footer.php"; ?>