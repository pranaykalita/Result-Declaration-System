<?Php include('common/sidenav.php');
if(isset($_POST["view"]))
{
    
    $sql = "SELECT * FROM `declared_res_tb` WHERE `id` = {$_POST["id"]}";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();

    
    
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">marksheet</h1>
            <button class="btn btn-primary m-3" id="download"><i class="fa fa-download" aria-hidden="true"></i>
                Download
                </button>
        </div>

        <div class="container-fluid" id="todownlaod">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- student details -->
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="subjec">Name</label>
                        </div>
                        <div class="col-sm-5">
                            <p class="text-dark"><?php echo $row["sname"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="subjec">Roll No</label>
                        </div>
                        <div class="col-sm-5">
                            <p><?php echo $row["sroll"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="subjec">Semester</label>
                        </div>
                        <div class="col-sm-5">
                            <p><?php echo $row["ssemester"]?> semester</p>
                        </div>
                    </div>


                    <!-- table result -->
                    <div class="table-responsive">
                        <table class="table text-center table-striped" id="markstable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Subjects</th>
                                    <th>Total</th>
                                    <th>marks Obtaied</th>
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
                            <td class="countsum countobt">'.$attr["obtained"].'</td>
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
        <div class="row">
                        <div class="col text-center">
                            <a href="results.php" type="button" class="btn btn-danger" id="print">Back</a>
                        </div>
                    </div>
</main>
<!-- js to calc bootom  -->
<script>

</script>

<?Php include('common/bottom.php') ?>