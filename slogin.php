<?php include('common/header.php');

// check already logged in or not
if(isset($_SESSION["sid"]))
{
    header("Location: account.php");
}


if(isset($_POST["loginbtn"]))
{
    $rollnum = $conn->real_escape_string($_POST["rnum"]);
    $dob = $_POST["dob"];

    $query = "SELECT `id`,`roll`,`dob` FROM `student_tb` WHERE `roll` = '{$rollnum}' AND `dob` = '{$dob}'";
    $data = $conn->query($query);

    if($row = mysqli_num_rows($data) > 0)
    {
        while($row = $data->fetch_assoc())
        {
            session_start();
            $_SESSION["sid"] = $row["id"];
            $_SESSION["sroll"] = $row["roll"];

            header("LOCATION: account.php");
        }
    }
    else
    {
        echo '
        <script>
        swal({
            title: "Wrong Details",
            text: "Pleadse Login Again Or create Ac!",
            icon: "warning",
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
                        <h3>Student Login</h3>
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="roll" class="col-md-4 col-form-label text-md-right">Roll No</label>
                                <div class="col-md-6">
                                    <input type="text" style="text-transform:uppercase" name="rnum" class="form-control"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of
                                    birth</label>
                                <div class="col-md-6">
                                    <input type="date" name="dob" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-4">
                                <button name="loginbtn" type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a href="sregister.php" class="btn btn-link">
                                    Register Here
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