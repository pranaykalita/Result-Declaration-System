<?php include('common/header.php');

if(!isset($_SESSION["sid"]))
{
    header("Location: /");
}
if(isset($_POST["search"]))
{
    $sem = $_POST["selecsem"];
    $sql = "SELECT * FROM `declared_res_tb` WHERE `sroll` = '{$_SESSION["sroll"]}' AND `ssemester` = '{$sem}'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();

}


?>
<!-- card notice -->
<div class="container">
    <div class="row">
        <div class="col text-right mt-2 ">
            <div class="col text-right">
                <button class="btn btn-primary" id="download"><i class="fa fa-download" aria-hidden="true"></i>
                Download
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5 " id="todownlaod">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body marksheet">
                    <div class="row">
                        <div class="col text-center my-3">
                           <img src="/img/logo.png" width="50%">
                        </div>
                         
                    </div>
                   <!-- stud details -->
                    <div class="row">
                        <div class="col">
                            <p class="float-right">Date :  <?Php echo date("d-M-Y") ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="subjec">Name of Student : <span class="font-weight-bold"><?php echo $row["sname"] ?></span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="subjec">Roll No :  <span class="font-weight-bold"><?php echo $row["sroll"] ?></span></label>
                        </div>
                        
                    </div>
                    <div class="row">
                    
                        <div class="col-sm-3">
                            <label for="subjec">Semester:  <span class="font-weight-bold"><?php echo $row["ssemester"] ?> semester</span></label>
                        </div>
                       
                        
                    </div>
                   
                    <!-- table result -->
                    <div class="table-responsive">
                        <table class="table text-center table-striped" id="markstable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Subjects </th>
                                    <th>Total</th>
                                    <th>marks Obtaied</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        
                        $jsondata = $row["marksdata"];
                        $marksdata =  json_decode($jsondata, true);

                        foreach($marksdata[0] as $attr)
                        {
                           echo '
                           <tr>
                            <td>'.$attr["srno"].'</td>
                            <td>'.$attr["subjects"].'</td>
                            <td class="countotal">'.$attr["total"].'</td>
                            <td class="countobt">'.$attr["obtained"].'</td>
                            <td class="remark"></td>
                           </tr>';
                        }
                        ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-dark font-weight-normal">Total Marks:<span id="totalmarks"
                                    class="font-weight-bold ml-2"></span> </div>
                            <div class="text-dark font-weight-normal">Total Obtained Marks:<span id="marksobtain"
                                    class="font-weight-bold ml-2"></span> </div>
                            <div class="text-dark font-weight-normal">percentage:<span id="percentile"
                                    class="font-weight-bold ml-2"></span>%</div>
                            <div class="text-dark font-weight-normal">Result:<span id="remakstatus"
                                    class="font-weight-bold ml-2"></span></div>
                            
                            
                        </div>
                        <div class="col">
                        <p class="text-right pt-5">Principal signature</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


    
		
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
</body>

</html>