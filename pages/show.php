<?php
  $sqli = "SELECT * FROM tbl_show ORDER BY id_show ASC";
  $query = mysqli_query($mysqli,$sqli); 
?>

<marquee width="100%" behavior="scroll" direction="left" scrollamount="5" bgcolor=" MidnightBlue" style="padding: 10px 0px;color: #FFFFE0;">  
<?php
    while($row = mysqli_fetch_array($query)){
?>
<i class="fa-sharp fa-solid fa-fire" style="color: #f70202;"></i><?php echo $row['thongtin'] ?><i class="fa-sharp fa-solid fa-fire" style="color: #f70202;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
    }
?>
</marquee>