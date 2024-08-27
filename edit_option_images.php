<?php include "header.php";
include "connection.php";
$id = $_GET["id"];
$id1 = $_GET["id1"];

$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$res = mysqli_query($link, "select * from questions where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Question with Images</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="form1" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header"><strong>EDIT QUESTION with IMAGES</strong></div>
                                            <div class="card-body card-block">
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit Question Statement</label><input type="text" name="fquestion" placeholder="Add Question here" class="form-control" value="<?php echo $question; ?>"></div>
                                                <div class="form-group"><img src="<?php echo $opt1; ?>" height="50" width="50"><br><label for="company" class=" form-control-label">Edit Option 01</label><input type="file" name="fopt1" class="form-control" style="padding-bottom:10px;"></div>
                                                <div class="form-group"><img src="<?php echo $opt2; ?>" height="50" width="50"><br><label for="company" class=" form-control-label">Edit Option 02</label><input type="file" name="fopt2" class="form-control"></div>
                                                <div class="form-group"><img src="<?php echo $opt3; ?>" height="50" width="50"><br><label for="company" class=" form-control-label">Edit Option 03</label><input type="file" name="fopt3" class="form-control"></div>
                                                <div class="form-group"><img src="<?php echo $opt4; ?>" height="50" width="50"><br><label for="company" class=" form-control-label">Edit Option 04</label><input type="file" name="fopt4" class="form-control"></div>
                                                <div class="form-group"><img src="<?php echo $answer; ?>" height="50" width="50"><br><label for="company" class=" form-control-label">Edit Answer of Question</label><input type="file" name="fanswer" class="form-control"></div>
                                                <div class="form-group"><input class="btn btn-success" type="submit" name="submit2" value="UPDATE QUESTION TO TEST"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </form>
                </div> <!-- .card -->

            </div>
            <!--/.col-->

            <?php 
            if(isset($_POST["submit2"])){
                $opt1=$_FILES["fopt1"]["name"];
                $opt2=$_FILES["fopt2"]["name"];
                $opt3=$_FILES["fopt3"]["name"];
                $opt4=$_FILES["fopt4"]["name"];
                $answer=$_FILES["fanswer"]["name"];
                
                $tm=md5(time());

                if($opt1!=""){
                    // i have used $.tm as when upload same image it will take different name in database
                    $dst1="./opt_images/".$tm.$opt1;
                    $dst_db1="opt_images/".$tm.$opt1;
                    move_uploaded_file($_FILES["fopt1"]["tmp_name"],$dst1);

                    mysqli_query($link, "update questions set question='$_POST[fquestion]',opt1='$dst_db1' where id=$id");
                }
                if($opt2!=""){
                    // i have used $.tm as when upload same image it will take different name in database
                    $dst2="./opt_images/".$tm.$opt2;
                    $dst_db2="opt_images/".$tm.$opt2;
                    move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

                    mysqli_query($link, "update questions set question='$_POST[fquestion]',opt2='$dst_db2' where id=$id");
                }
                if($opt3!=""){
                    // i have used $.tm as when upload same image it will take different name in database
                    $dst3="./opt_images/".$tm.$opt3;
                    $dst_db3="opt_images/".$tm.$opt3;
                    move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

                    mysqli_query($link, "update questions set question='$_POST[fquestion]',opt3='$dst_db3' where id=$id");
                }
                if($opt4!=""){
                    // i have used $.tm as when upload same image it will take different name in database
                    $dst4="./opt_images/".$tm.$opt4;
                    $dst_db4="opt_images/".$tm.$opt4;
                    move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);

                    mysqli_query($link, "update questions set question='$_POST[fquestion]',opt4='$dst_db4' where id=$id");
                }
                if($answer!=""){
                    // i have used $.tm as when upload same image it will take different name in database
                    $dst5="./opt_images/".$tm.$answer;
                    $dst_db5="opt_images/".$tm.$answer;
                    move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst5);

                    mysqli_query($link, "update questions set question='$_POST[fquestion]',answer='$dst_db5' where id=$id");
                }
                mysqli_query($link, "update questions set question='$_POST[fquestion]' where id=$id");
                ?>
                <script type="text/javascript">
                    window.location="add_edit_questions.php?id=<?php echo $id1 ?>";
                </script>
                <?php
            }
                
            ?>
            
            <?php include "footer.php"; ?>