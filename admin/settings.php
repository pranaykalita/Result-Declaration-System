<?Php include('common/sidenav.php');

// save pin

if(isset($_POST["genpin"]))
{
    $pin = $_POST["adpin"];
    $sql = "INSERT INTO `adminpin_tb`( `pin`) VALUES ('$pin')";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
}

// delete pin
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM `adminpin_tb` WHERE `id`= $id";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Admin Settings</h1>
            <div class="card mb-4">
            </div>
            
            <!-- generte code for new admin -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Generate Admin Registration Pin</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="currentpass">Registration Pin</label>
                            <input type="number" name="adpin" id="admpin" class="form-control" >
                           
                        </div>
                        <button type="submit" class="btn btn-danger" name="genpin">Save new Pin</button>
                    </form>
                </div>
            </div>

            <!-- show available pin -->
            <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Pin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php
                                        $sql = "SELECT * FROM `adminpin_tb`";
                                        $data = $conn->query($sql);
                                        
                                        while($row = $data->fetch_assoc())
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$row["pin"].'</td>
                                                <td>
                                                    <form action="" method="post">
                                                    <input type="hidden" name="id" value='.$row["id"].'>
                                                    <button type="submit" class="btn btn-danger" name="delete" >
                                                    <i class="far fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            ';
                                            
                                        }
                                            
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        </div>
    </main>
    <?Php include('common/bottom.php') ?>