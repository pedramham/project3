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
$contact=$_GET['contact'];
if($contact==12)
{
    $posation='about_us';
	$m_date= date("Y-m-d");
	$m_time= date("H:i:s");
    $m_about_us_titre=$_POST['m_about_us_titre'];
	$m_about_us_subject=$_POST['m_about_us_subject'];
    $m_email=$_POST['m_email'];
	$m_tellephon=$_POST['m_tellephon'];
	$m_mobailphon=$_POST['m_mobailphon'];
	$m_addres=$_POST['m_addres'];
    $m_countact_us_subject=$_POST['m_countact_us_subject'];

	$arrayinsert="INSERT INTO m_page_defult(m_date,m_time,m_about_us_titre,m_about_us_subject
	,m_email,m_tellephon,m_mobailphon,m_addres,posation,m_countact_us_subject)
	VALUES('$m_date','$m_time','$m_about_us_titre','$m_about_us_subject'
	,'$m_email','$m_tellephon','$m_mobailphon','$m_addres','$posation','$m_countact_us_subject')";
	$stmt=$DBM->dbh->prepare($arrayinsert);
	$stmt->execute();

}
     $posation='about_us';
	$query_product = "select m_about_us_titre,m_about_us_subject
	,m_email,m_tellephon,m_mobailphon,m_addres,m_countact_us_subject from m_page_defult where posation=:posation
	order by m_id desc LIMIT 1";
	$query_product = $DBM->dbh->prepare($query_product);
	$query_product->bindValue(':posation', $posation, PDO::PARAM_STR);
	$query_product->execute();

	while($row_file = $query_product->fetch(PDO::FETCH_ASSOC)){
	$m_about_us_titre=$row_file['m_about_us_titre'];
	$m_about_us_subject=$row_file['m_about_us_subject'];
	$m_email=$row_file['m_email'];
	$m_tellephon=$row_file['m_tellephon'];
	$m_mobailphon=$row_file['m_mobailphon']; 
	$m_addres=$row_file['m_addres'];
    $m_countact_us_subject=$row_file['m_countact_us_subject'];
   }
?>
   <div class="col-md-12 tab_back top-80">
      <div class="panel panel-default margin_top" style="background-color: rgba(227, 235, 252, 0.45);">
		<div class="header_box text_persian" style="background-color:#AF0202;font-family: tahoma;color:#FFFFFF;">
		مدیریت اخبار سایت
		</div>
		<div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?contact=12&lang=<?php echo $lang ?>" enctype="multipart/form-data">
			<div class="col-md-10">
			<div class="form-group"><label class="fonttext" >:تیتر</label>
			<input name="m_about_us_titre" type="text" class="form-control"  value="<?php echo $m_about_us_titre  ?>" >
			</div>
			</div>
		</div>
        <div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
			<div class="col-md-10"><label class="fonttext" >درباره ما</label>
			<textarea class="form-control" name="m_about_us_subject" >
			<?php echo $m_about_us_subject ?>
			</textarea>
			</div>
		</div>
        <div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
			<div class="col-md-10"><label class="fonttext" >تماس با ما</label>
			<textarea class="form-control" name="m_countact_us_subject" >
			<?php echo $m_countact_us_subject ?>
			</textarea>
			</div>
		</div>
		<div class="col-md-12 float-right"  style="background-color:#C7FFC4;">
			<div class="col-md-2">
			</div>
			<div class="col-md-12">
				<div class="col-md-4">
				<div class="form-group"><label class="fonttext" for="">ایمیل</label>
				<input name="m_email" type="text" id="disabledInput" class="form-control" id="exampleInputEmail1" value="<?php echo $m_email ?>" >
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group"><label class="fonttext" for="">شماره تلفن</label>
				<input name="m_tellephon" type="text" id="disabledInput" class="form-control" id="exampleInputEmail1" value="<?php echo $m_tellephon ?>" >
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group"><label class="fonttext" for="">شماره موبایل</label>
				<input name="m_mobailphon" type="text" id="disabledInput" class="form-control" id="exampleInputEmail1" value="<?php echo $m_mobailphon ?>" >
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 float-right" style="background-color:#C4E6FF;">
			<div class="form-group"><label class="fonttext" >آدرس</label>
			<input name="m_addres" type="text" class="form-control"  value="<?php echo $m_addres  ?>" >
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
