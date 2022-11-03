<?Php include('common/sidenav.php');

// delete stud data
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM `declared_res_tb` WHERE `id`= $id";
    $conn->query($sql);


    echo "<meta http-equiv='refresh' content='0;url='>";
} 

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Results</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>semester</th>
                                                <th>RollNo</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = "SELECT * FROM `declared_res_tb`";
                                        $data = $conn->query($query);
                                        while($row = $data->fetch_assoc())
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$row["sname"].'</td>
                                                <td>'.$row["ssemester"].'</td>
                                                <td>'.$row["sroll"].'</td>
                                                <td>
                                                    <form action="viewresult.php" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["id"].'>
                                                    <button type="submit" class="btn btn-success" name="view" >
                                                    <i class="far fa-eye"></i> View</button>
                                                    </form>

                                                    <form action="updateresult.php" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["id"].'>
                                                    <button type="submit" class="btn btn-primary" name="edit" >
                                                    <i class="fa fa-pen"></i> Edit</button>
                                                    </form>
                                                   
                                                   
                                                    
                                                    <form action="" method="post"  class="d-inline">
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