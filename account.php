<?php include('common/header.php');

if(!isset($_SESSION["sid"]))
{
    header("Location: /");
}

// update sem
if(isset($_POST["updatesem"]))
{
    $sem = $_POST["usemester"];
    $query = "UPDATE `student_tb` SET `sem`='$sem' WHERE `roll` = '{$_SESSION["sroll"]}'";
    $data = $conn->query($query);
    echo '
    <script>
    window.location = "account.php"
    </script>';
}

// get student details
$query = "SELECT * FROM `student_tb` WHERE `id` = '{$_SESSION["sid"]}'";
$data = $conn->query($query);
$row = $data->fetch_assoc();
?>
<!-- card notice -->
<div class="container-fluid" id="datasec">
    <div class="row">
        <div class="col">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Results</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Account</a>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <!-- result table -->

                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- student details -->

                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="subjec">Name</label>
                                </div>
                                <div class="col-sm-5">
                                    <p class="text-dark"><?php echo $row["name"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="subjec">Roll No</label>
                                </div>
                                <div class="col-sm-5">
                                    <p id="sturoll"><?php echo $row["roll"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="subjec">Current Semester</label>
                                </div>
                                <div class="col-sm-5">
                                    <p><?php echo $row["sem"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <div class="col-7">
                                <form action="viewmarks.php" target="_blank" method="post" class="form-group">
                                    <div class="form-group mb-2">
                                        <select class="form-control" id="selsem" name="selecsem" required>
                                            <option value="">Select Semeter</option>
                                            <?php 
                                    // get available semester
                                    $query2 = "SELECT * FROM `declared_res_tb` WHERE sroll = '{$_SESSION["sroll"]}'";
                                    $ret = $conn->query($query2);
                                    while($row2= $ret->fetch_assoc())
                                    {
                                       echo '<option>'.$row2["ssemester"].'</option>';
                                    }
                                ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="searchbtn"
                                        name="search">search</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- end -->
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- student details -->
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="subjec">Name</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="text-dark"><?php echo $row["name"] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="subjec">Roll No</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="text-dark"><?php echo $row["roll"] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="subjec">Semester</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="selsem" name="usemester" value="">
                                            <option disabled selected><?php echo $row["sem"] ?></option>
                                            <?php 
                                    // get available semester
                                    $query2 = "SELECT * FROM `semester_tb`";
                                    $ret = $conn->query($query2);
                                    while($row2= $ret->fetch_assoc())
                                    {
                                       echo '<option>'.$row2["semester"].'</option>';
                                    }

                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-danger" name="updatesem">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
</div>


<?php include('common/footer.php')?>