<?php
include('database.php');
// get result by semester

if(isset($_POST["loadres"]))
{
    $sroll = $_POST["studroll"];
    $ssemester = $_POST["semester"];

    $query = "SELECT * FROM `declared_res_tb` WHERE `ssemester` = '{$ssemester}' AND `sroll` = '{$sroll}'";
    $data = $conn->query($query);
    $row = $data->fetch_assoc();

    $jsondata = $row["marksdata"];
    $marksheetdata = json_decode($jsondata, true);

    foreach($marksheetdata[0] as $attr)
    {
        echo '
        <tr>
            <td>'.$attr["srno"].'</td>
            <td>'.$attr["subjects"].'</td>
            <td class="totalm">'.$attr["total"].'</td>
            <td class="obtmark">'.$attr["obtained"].'</td>
        </tr>
        <t
        ';
    }
    

}
?>