<?php include "include/hedear.php";
?>
<body>
   <div class="container">
<div class="container" >
<?php include "include/menu.php";
?>
<?php
include "../include/db.php";
$DBM=new Database;
$DBM->connect();
$news=$_GET['news'];
if($news==12)
{
	$m_date= date("Y-m-d");
	$m_time= date("H:i:s");
	$m_posation='m_news';
	$m_title=$_POST['m_title'];
	$m_subject=$_POST['m_subject'];
    $m_link_news="linke";
	$arrayinsert="INSERT INTO m_news(m_date,m_time,m_title,m_subject,m_link_news,m_posation)
	VALUES('$m_date','$m_time','$m_title','$m_subject','$m_link_news','$m_posation')";
	$stmt=$DBM->dbh->prepare($arrayinsert);
	$stmt->execute();
	/////update linke news////
	$queryid = "select m_id from m_news where m_posation='$m_posation' order by m_id desc limit 1;";
	$querys = $DBM->dbh->prepare($queryid);
	$querys->execute();
	$row = $querys->fetch(PDO::FETCH_ASSOC);
	$m_id = htmlspecialchars($row['m_id']);

	$m_id=$m_id;
	$m_incode=base64_encode($m_id);
	$m_link_news= "/articel.php?news=".$m_incode;
	//upadte id for linke khabar
	$queryupdate=" UPDATE m_news SET m_link_news='$m_link_news' WHERE m_id=$m_id ; ";
	$stmtu=$DBM->dbh->prepare($queryupdate);
	$stmtu->execute();
}
?>
   <div class="col-md-12 tab_back top-80">
      <div class="panel panel-default margin_top" style="background-color: rgba(227, 235, 252, 0.45);">
		<div class="header_box text_persian" style="background-color: #00E667;font-family: tahoma;color: #AF0900;">
		مدیریت اخبار سایت
		</div>
		<div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?news=12">
			<div class="col-md-10">
			<div class="form-group"><label class="fonttext" for="">تیترمقاله</label>
			<input name="m_title" type="text" id="disabledInput" class="form-control"  value="" >
			</div>
			</div>
		</div>
        <div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
			<div class="col-md-10"><label class="fonttext" >مقاله</label>
			<textarea class="form-control" name="m_subject" id="Editor" value=""></textarea>
			</div>
		</div>
	<br>
	<input class="btn btn-warning fonttext " type="submit" value="ثبت اطلاعات"  align="right"/>
	</form>
	<br>
	</div>
	</div>

</div>
</div>
</div>
</div>
</div>


</body>
</html>
