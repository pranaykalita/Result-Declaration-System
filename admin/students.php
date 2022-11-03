<?Php include('common/sidenav.php');
// delete sub
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $sql = "DELETE FROM `student_tb` WHERE `id`= $id";
    $conn->query($sql);
    echo "<meta http-equiv='refresh' content='0;url='>";
} 
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student Details</h1>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Roll No</th>
                                                <th>Current semester</th>
                                                <th>Date of Birth</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php

                                        $sql = "SELECT * FROM `student_tb`";
                                        $data = $conn->query($sql);
                                        
                                        while($row = $data->fetch_assoc())
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["roll"].'</td>
                                                <td>'.$row["sem"].'</td>
                                                <td>'.$row["dob"].'</td>
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