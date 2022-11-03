<?php include('common/sidenav.php');


// total students registered
$query = "SELECT COUNT(`id`) FROM `student_tb`";
$data = $conn->query($query);
$res = $data->fetch_row();
$tstudreg =  $res[0];

// result declared to
$query = "SELECT COUNT(`id`) FROM `declared_res_tb`";
$data = $conn->query($query);
$res = $data->fetch_row();
$tresdecl =  $res[0];

// total sub
$query = "SELECT COUNT(`id`) FROM `subjects_tb`";
$data = $conn->query($query);
$res = $data->fetch_row();
$tsub =  $res[0];

// total semester
$query = "SELECT COUNT(`id`) FROM `semester_tb`";
$data = $conn->query($query);
$res = $data->fetch_row();
$tsem =  $res[0];

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body">Student Registered </div>
                            <div class="card-body"><?php echo $tstudreg ?></div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="students.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body">Result declared </div>
                            <div class="card-body"><?php echo $tresdecl ?></div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="results.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body">Total Subjects </div>
                            <div class="card-body"><?php echo $tsub ?></div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="subjects.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                    <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body">Total semesters </div>
                            <div class="card-body"><?php echo $tsem ?></div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="semester.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Declared Results 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Semester</th>
                                    <th>Roll</th>
                                    <th>Result Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // available students
                            $query = "SELECT * FROM `declared_res_tb`";
                            $ret = $conn->query($query);
                            while($row = $ret->fetch_assoc())
                            {
                                echo '
                                <tr>
                                    <td>'.$row["sname"].'</td>
                                    <td>'.$row["ssemester"].'</td>
                                    <td>'.$row["sroll"].'</td>
                                    <td class="text-success">Declared</td>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('common/bottom.php');?>