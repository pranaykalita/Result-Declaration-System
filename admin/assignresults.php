<?Php include('common/sidenav.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Generate marksheet</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- student details -->
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="rollNumber">Roll No</label>
                                    <select type="text" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="rollnum" >
                                    <option disabled selected>Select Student RollNumber</option>
                                    <?php 
                                    // student names
                                    $query = "SELECT * FROM `student_tb`";
                                    $ret = $conn->query($query);
                                    while($row = $ret->fetch_assoc())
                                    {
                                        echo '<option>'.$row["roll"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="semester"> Result semester</label>
                                    <select type="text" class="form-control" id="sem">
                                    <?php 
                                    // get available semester
                                    $query2 = "SELECT * FROM `semester_tb`";
                                    $ret = $conn->query($query2);
                                    while($row = $ret->fetch_assoc())
                                    {
                                       echo '<option>'.$row["semester"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentname">Student Name</label>
                            <input type="text" class="form-control" id="sname" value="" readonly>
                            <small class="form-text text-muted">Student must register First</small>
 
                        </div>
                        <input type="button" class="btn btn-success" id="setstudent" value="Assign Student">
                   

                    <!-- marks -->
                    <div class="marks">
                        <div class="row mt-3">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="subjec">Sl No</label>
                                    <input type="number" class="form-control" id="slno" >
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
                                    while($row = $ret->fetch_assoc())
                                    {
                                        echo '<option>'.$row["subject"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="totalmarks">Total marks</label>
                                    <input type="Number" class="form-control" id="totalmarks" value="100">
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
                    <div class="row text-center">
                        <div class="col-4">
                            <span>Student Name:</span><p id="psname"></p>
                        </div>
                        <div class="col-4">
                        <span>Roll Number:</span><p id="psroll"></p>
                        </div>
                        <div class="col-4">
                        <span>Semester:</span><p id="pssem"></p>
                        </div>
                    </div>

                    <!-- table result -->
                    <div class="table-responsive">
                        <table class="table text-center" id="markstable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Subjects</th>
                                    <th>Total</th>
                                    <th>marks Obtaied</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    
                    
                    

                    <div class="row">
                        <div class="col text-center">
                            <input type="button" class="btn btn-primary" id="savemarks" value="SAVE MARKSHEET">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?Php include('common/bottom.php') ?>
    