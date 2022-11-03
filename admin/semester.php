<?Php include('common/sidenav.php');

// delete sem
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM `semester_tb` WHERE `id`= $id";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
}

// add sem
if(isset($_POST["addsem"]))
{
    $sem = $_POST["sem"];
    $sql = "INSERT INTO `semester_tb`(`semester`) VALUES ('$sem')";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Semester</h1>
            <div class="row">
                <div class="col-sm-4 my-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertsem"><i
                            class="fa fa-plus"></i> Add New </button>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                        $sql = "SELECT * FROM `semester_tb`";
                                        $data = $conn->query($sql);
                                        
                                        while($row = $data->fetch_assoc())
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$row["semester"].'</td>
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

            <!-- insert sem modal  -->
            <div class="modal fade" id="insertsem" tabindex="-1" role="dialog" aria-labelledby="insertsub"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="addsem">Semester</label>
                                    <input type="text" class="form-control" name="sem" placeholder="Enter Semester">
                                    
                                </div>
                                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addsem">Add Course</button>
                        </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?Php include('common/bottom.php'); ?>