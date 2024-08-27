<?php 
include "header.php";
include "connection.php";
$id=$_GET["id"];
$id1=$_GET["id1"];

$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$res=mysqli_query($link, "select * from questions where id=$id");
while($row=mysqli_fetch_array($res)){
    $question=$row["question"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];
}
?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Update Question</h1>
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
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">

                                <form name="form1" action="" method="POST" enctype="multipart/form-data">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header"><strong>UPDATE QUESTIONS with TEXT</strong></div>
                                            <div class="card-body card-block">
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Question Statement</label><input type="text" name="fquestion" placeholder="Add Question here" class="form-control" value="<?php echo $question; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Option 01</label><input type="text" name="opt1" placeholder="Add Option 1 here" class="form-control" value="<?php echo $opt1; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Option 02</label><input type="text" name="opt2" placeholder="Add Option 2 here" class="form-control" value="<?php echo $opt2; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Option 03</label><input type="text" name="opt3" placeholder="Add Option 3 here" class="form-control" value="<?php echo $opt3; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Option 04</label><input type="text" name="opt4" placeholder="Add Option 4 here" class="form-control" value="<?php echo $opt4; ?>"></div>
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Answer of Question</label><input type="text" name="answer" placeholder="Add answer of question here" class="form-control" value="<?php echo $answer; ?>"></div>
                                                <div class="form-group"><input class="btn btn-success" type="submit" name="submit1" value="UPDATE QUESTION TO TEST"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->

            <?php 
            if(isset($_POST["submit1"])){
                mysqli_query($link, "update questions set question='$_POST[fquestion]', opt1='$_POST[opt1]', opt2='$_POST[opt2]', opt3='$_POST[opt3]', opt4='$_POST[opt4]', answer='$_POST[answer]' where id=$id");
                ?>
                <script type="text/javascript">
                    window.location="add_edit_questions.php?id=<?php echo $id1 ?>";
                </script>
                <?php
            }
            ?>
            <?php include "footer.php"; ?>
