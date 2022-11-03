<?php include('common/header.php');

// check and register alredy available student
if(isset($_POST["sregister"]))
{
    $sname = $_POST["sname"];
    $sroll = $_POST["sroll"];
    $sdob = $_POST["sdob"];
    $ssem = $_POST["ssem"];

    // check
    $query = "SELECT * FROM `student_tb` WHERE `roll`= '$sroll' AND `dob` = '$sdob'";
    $data = $conn->query($query);

    if(mysqli_num_rows($data) > 0)
    {
        // warning
        echo '
        <script>
        swal({
            title: "Account already available",
            text: "Pleadse Login to check result",
            icon: "warning",
            button: "Login",
        });
        </script>';

    }
    else
    {
        // create account
        $query = "INSERT INTO `student_tb`(`name`, `roll`, `dob`, `sem`) VALUES ('$sname','$sroll','$sdob','$ssem')";
        $conn->query($query);
        echo '
        <script>
        swal({
            title: "Account Created!",
            text: "Pleadse Login To View Results!",
            icon: "success",
            button: "Login",
        }).then(function() {
            window.location = "/";
        });
        </script>';

    }

}


?>

    <!-- card notice -->
    <div class="container-fluid" id="datasec">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body m-4 text-center ">
                        <i class="fas fa-user-graduate fa-3x pb-5"></i>
                        <h3>Create account</h3>
                        <form action="" method="POST">
                            <div class="form-group row mt-4">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sname" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Roll" class="col-md-4 col-form-label text-md-right">Roll Number</label>
                                <div class="col-md-6">
                                    <input type="text"  style="text-transform:uppercase" class="form-control" name="sroll" required >

                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="sdob" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-md-4 col-form-label text-md-right">Current semester</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="ssem"  required >
                                       <?php
                                       // get available semester
                                        $query = "SELECT * FROM `semester_tb`";
                                        $data = $conn->query($query);
                                        while($row = $data->fetch_assoc())
                                        {
                                           echo '<option selected>'.$row["semester"].'</option>';
                                        }
                                       ?>
                                    </select>   

                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-4">
                                <button type="submit" class="btn btn-primary" name="sregister">
                                    Register
                                </button>
                                <a href="slogin.php" class="btn btn-link">
                                    Login Here
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('common/footer.php')?>