<?Php include('common/sidenav.php');

if(isset($_POST["edit"]))
{
    $sql = "SELECT * FROM `declared_res_tb` WHERE `id` = {$_POST["id"]}";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
  
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update marksheet</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- student details -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rollNumber">Roll No</label>
                                <input type="text" class="form-control selectpicker" id="srollnum"
                                    value="<?php echo $row["sroll"] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="semester">semester</label>
                                <input type="text" class="form-control" id="susem"
                                    value="<?php echo $row["ssemester"] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="studentname">Student Name</label>
                        <input type="text" class="form-control" value="<?php echo $row["sname"] ?>" readonly>
                    </div>

                    <!-- marks -->
                    <div class="marks">
                        <div class="row mt-3">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="subjec">Sl No</label>
                                    <input type="number" class="form-control" id="slno">
                                </div>

                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="subjec">Subjects</label>
                                    <select class="form-control" id="subjects">
                                        <?php 
                                    // student names
                                    $query = "SELECT * FROM `subjects_tb`";
                                    $ret = $conn->query($query);
                                    while($rows = $ret->fetch_assoc())
                                    {
                                        echo '<option>'.$rows["subject"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="totalmarks">Total marks</label>
                                    <input type="Number" class="form-control" id="totalmarks">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="markobtained">marks Obtained</label>
                                    <input type="Number" class="form-control" id="marksobtained">
                                </div>
                            </div>
                        </div>
                        <input type="button" class="btn btn-primary" id="addmarks" value="Add marks">
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">

                    <!-- table result -->
                    <div class="table-responsive">
                        <table class="table text-center table-striped" id="markstable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Subjects / Papers</th>
                                    <th>Total</th>
                                    <th>marks Obtaied</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $mdata = $row["marksdata"];
                            $jsdondata = json_decode($mdata,true);
                            foreach($jsdondata[0] as $attr)
                            {
                            echo '
                            <tr>
                                <td contenteditable="true" >'.$attr["srno"].'</td>
                                <td contenteditable="true">'.$attr["subjects"].'</td>
                                <td contenteditable="true">'.$attr["total"].'</td>
                                <td contenteditable="true">'.$attr["obtained"].'</td>
                                <td><input type="button" class="btn btn-danger" id="delsub" value="Delete"></td>
                            </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        

                        <div class="row">
                            <div class="col text-center">
                                <input type="button" class="btn btn-primary" id="updatemarksheet"
                                    value="Update MARKSHEET">
                                <a href="results.php" type="button" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?Php include('common/bottom.php') ?>