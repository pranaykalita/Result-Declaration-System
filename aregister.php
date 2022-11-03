<?php include('common/header.php');

// Register admin data
if(isset($_POST["registeradmin"]))
{
    $name = $_POST["aname"];
    $email = $_POST["aemail"];
    $password = $_POST["apass"];
    $pin = $_POST["apin"];

    

    // check for admin pin
    $query = "SELECT * FROM `adminpin_tb` where `pin` = $pin";
    $data = $conn->query($query);

    if(mysqli_num_rows($data) > 0)
    {
        // if matched register
        $query = "INSERT INTO `admin_tb`( `Name`, `Email`, `Password`,`pin`) 
        VALUES ('$name','$email','$password','$pin')";
        $conn->query($query);
        echo '
        <script>
        swal({
            title: "Account Created!",
            text: "Pleadse Login To access!",
            icon: "success",
            button: "Login",
        }).then(function() {
            window.location = "/";
        });
        </script>';
    }
    else
    {
        echo '
        <script>
        swal({
            title: "Incorrect Pin",
            text: "Pleadse Contact administrator to get a valid pin",
            icon: "warning",
            button: "Try Again",
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
                        <h3>Create account</h3>
                        <form action="" method="POST">
                            <div class="form-group row mt-4">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="aname" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="aemail" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="password" class="col-md-4 col-form-label text-md-right">password</label>
                                <div class="col-md-6">
                                    <input type="password" name="apass" minlength="6" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="Opin" class="col-md-4 col-form-label text-md-right">Security Pin</label>
                                <div class="col-md-6">
                                    <input type="number" name="apin" minlength="6" class="form-control" required >
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 mt-4">
                                <button type="submit" class="btn btn-primary" name="registeradmin">
                                    Register
                                </button>
                                <a href="alogin.php" class="btn btn-link">
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