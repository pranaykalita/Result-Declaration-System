<?Php include('common/sidenav.php');
// delete sub
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM `subjects_tb` WHERE `id`= $id";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
}
// add sub
if(isset($_POST["addcourse"]))
{
    $sub = $_POST["sub"];
    $sem = $_POST["sem"];

    $sql = "INSERT INTO `subjects_tb`(`subject`, `semester`) VALUES ('$sub','$sem')";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
} 
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Subjects</h1>
            <div class="row">
                <div class="col-sm-4 my-4">
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#insertsub"><i class="fa fa-plus"></i> Add New Subject</button>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                        $sql = "SELECT * FROM `subjects_tb`";
                                        $data = $conn->query($sql);
                                        
                                        while($row = $data->fetch_assoc())
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$row["subject"].'</td>
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

            <!-- insert sub modal  -->
            <div class="modal fade" id="insertsub" tabindex="-1" role="dialog" aria-labelledby="insertsub"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Subjects</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="addsub">Subject Name</label>
                                    <input type="text" class="form-control" name="sub" placeholder="Enter Subject">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="addsem">Semester</label>
                                    <select type="text" class="form-control" name="sem">
                                    <?php 
                                    // student names
                                    $query = "SELECT * FROM `semester_tb`";
                                    $ret = $conn->query($query);
                                    while($row = $ret->fetch_assoc())
                                    {
                                        echo '<option>'.$row["semester"].'</option>';
                                    }
                                    ?>
                                    </select>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addcourse">Add Course</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?Php include('common/bottom.php') ?>