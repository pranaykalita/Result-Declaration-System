<?php include('common/header.php');

if(isset($_SESSION["aid"]))
{
    header("Location: admin/");
}


if(isset($_POST["adminlogin"]))
{
    $aemail = $conn->real_escape_string($_POST["amail"]);
    $apass = $conn->real_escape_string($_POST["apass"]);


    $query = "SELECT `id`, `name`, `Email`, `Password` FROM `admin_tb` WHERE `Email` = '{$aemail}' AND `Password` = '{$apass}'";
    $data = $conn->query($query);

    if($row = mysqli_num_rows($data) > 0)
    {
        while($row = $data->fetch_assoc())
        {
            session_start();
            $_SESSION["aid"] = $row["id"];

            header("LOCATION: admin/");
        }
    }
    else
    {
        echo '
        <script>
        swal({
            title: "Wrong Details",
            text: "Pleadse Login Again Or create Account!",
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
                        <i class="fas fa-chalkboard-teacher fa-3x pb-5"></i>
                        <h3>Admin Login</h3>
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="roll" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="amail" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">password</label>
                                <div class="col-md-6">
                                    <input type="password" minlength="6" name="apass" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-4">
                                <button type="submit" name="adminlogin" class="btn btn-primary">
                                    Login
                                </button>
                                <a href="aregister.php" class="btn btn-link">
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