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
$submit=$_GET['submit'];
if($submit==1)
{
    $posation='defult_memo';
    $m_titre=$_POST['m_titre'];
	$m_memo_index=$_POST['m_memo_index'];
    $m_date= date("Y-m-d");
	$m_time= date("H:i:s");
	$rand=rand(52, 1525);
	/////////////////////////////////////pic_slider///////////
	$m_pic_slider_index = $rand;
    $m_pic_slider_indexquery="images/slider/".$m_pic_slider_index.basename($_FILES['m_pic_slider_index']['name']);
	$targtem_pic_slider_index="../images/slider/".$m_pic_slider_index.basename($_FILES['m_pic_slider_index']['name']);
	if (file_exists("imagmain.$_FILES ['m_pic_slider_index']['name']"));
	if(move_uploaded_file($_FILES['m_pic_slider_index']['tmp_name'],$targtem_pic_slider_index))
    {
	 echo $targtem_pic_slider_index."";
	}
	else{
	$query_defult_memo = "select m_pic_slider_index
	from m_page_defult
	where  posation='defult_memo'  order by m_id desc limit 1;";
	$query_defult = $DBM->dbh->prepare($query_defult_memo);
	$query_defult->execute();
	$row_defult = $query_defult->fetch(PDO::FETCH_ASSOC);
	$m_pic_slider_indexquery=$row_defult['m_pic_slider_index'];
	}

	/////////////////////////////////////m_pic_index///////////
	$m_pic_index = $rand;
	$m_pic_indexquery="images/indeximag/".$m_pic_index.basename($_FILES['m_pic_index']['name']);
	$targtem_m_pic_index="../images/indeximag/".$m_pic_index.basename($_FILES['m_pic_index']['name']);
	if (file_exists("imagmain.$_FILES ['m_pic_index']['name']"));
	if(move_uploaded_file($_FILES['m_pic_index']['tmp_name'],$targtem_m_pic_index))
	{
	echo $targtem_m_pic_index."";
	}
	else{
	$query_defult_memo = "select m_pic_index
	from m_page_defult
	where posation='defult_memo'  order by m_id desc limit 1;";
	$query_defult = $DBM->dbh->prepare($query_defult_memo);
	$query_defult->execute();
	$row_defult = $query_defult->fetch(PDO::FETCH_ASSOC);
	$m_pic_indexquery=$row_defult['m_pic_index'];
	}
	///////////////////////////////m_pic_logo////m_pic_logom_pic_logo////
	$m_pic_logo = $rand;
	$m_pic_logo_query="images/indeximag/".$m_pic_logo.basename($_FILES['m_pic_logo']['name']);
	$m_pic_logo_index="../images/indeximag/".$m_pic_logo.basename($_FILES['m_pic_logo']['name']);
	if (file_exists("imagmain.$_FILES ['m_pic_logo']['name']"));
	if(move_uploaded_file($_FILES['m_pic_logo']['tmp_name'],$m_pic_logo_index))
	{
	echo $m_pic_logo_query."";
	}
	else{
	$query_defult_memo = "select m_pic_logo
	from m_page_defult
	where posation='defult_memo'  order by m_id desc limit 1;";
	$query_defult = $DBM->dbh->prepare($query_defult_memo);
	$query_defult->execute();
	$row_defult = $query_defult->fetch(PDO::FETCH_ASSOC);
	$m_pic_logo_query=$row_defult['m_pic_logo'];
	}
    //////////////////////////////m_pic_Logo///////////////////////

      $arrayinsert="INSERT INTO m_page_defult(m_date,m_time,m_pic_slider_index,m_memo_index,m_pic_index,
	  m_pic_logo,posation,m_titre)
	  VALUES('$m_date','$m_time','$m_pic_slider_indexquery','$m_memo_index','$m_pic_indexquery',
	  '$m_pic_logo_query','$posation','$m_titre')";
	  $stmt=$DBM->dbh->prepare($arrayinsert);
	  $stmt->execute();

	}


    $query_select = "select m_memo_index,m_pic_logo,m_pic_index,m_pic_slider_index,m_titre
	from m_page_defult where posation='defult_memo'  order by m_id desc limit 1;";
	$querys = $DBM->dbh->prepare($query_select);
	$querys->execute();
	while($row = $querys->fetch(PDO::FETCH_ASSOC)){
		$m_memo_index= $row['m_memo_index'];
        $m_pic_logo= $row['m_pic_logo'];
        $m_pic_index= $row['m_pic_index'];
        $m_pic_slider_index= $row['m_pic_slider_index'];
        $m_titre= $row['m_titre'];
		}

?>

 <div class="col-md-12 tab_back top-80">
   <div class="panel panel-default margin_top">
   		<div class="header_box text_persian" style="background-color: #E6BF00;font-family: tahoma;color: #792727;font-weight: 600;font-size: 14px;">
		مدیریت مطالب اصلی
		</div>
      <div class="panel-body back">
		<div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?submit=1&lang=<?php echo $lang ?>" enctype="multipart/form-data">
		</div>
		<div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>		
			<div class="col-md-10">
            <div class="col-md-6">
            <img src="../<?php echo $m_pic_logo ?>" width="100px" height="100px" />
			<div class="form-group" ><label class="fonttext" for="">انتخاب عکس لوگو</label>
			<input type="file" name="m_pic_logo" class="form-control" value="<?php echo $m_pic_logo ?>" >
			</div>
			</div>
            <div class="col-md-6">
            <img src="../<?php echo $m_pic_index ?>" width="100px" height="100px" />
			<div class="form-group" ><label class="fonttext" for="">انتخاب عکس باکس صفحه اصلی</label>
			<input type="file" name="m_pic_index" class="form-control" value="<?php echo $m_pic_index ?>"  >
			</div>
			</div>
			</div>
		</div>
		<div class="col-md-10 float-right">
			<div class="col-md-6">

			</div>
			<div class="col-md-6">
            <img src="../<?php echo $m_pic_slider_index ?>" width="100px" height="100px" />
			<div class="form-group" ><label class="fonttext" for="">انتخاب عکس صفحه اصلی</label>
			<input type="file" name="m_pic_slider_index" class="form-control" value="<?php echo $m_pic_slider_index ?>" >
			</div>
			</div>
		</div>
        		<div class="col-md-10 float-right">
			<div class="col-md-6">

			</div>
			<div class="col-md-6">
            <div class="form-group"><label class="fonttext" for="">:تیتر</label>
			<input name="m_titre" type="text" id="disabledInput" class="form-control"  value="<?php echo $m_titre ?>" >
			</div>
			</div>
		</div>
		<div class="col-md-12 float-right">
			<div class="col-md-2">
			</div>
			<div class="col-md-10"><label class="fonttext" >مطلب اصلی </label>
			<textarea class="form-control" name="m_memo_index" id="Editor" value="<?php echo $m_memo_index ?>"><?php echo $m_memo_index ?></textarea>
			</div>
		</div>


        </div>
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
   <script>
       $(document).ready(function() {
           $('#Editor2').ckeditor();
       });
	   $(document).ready(function() {
            $('#Editor2').ckeditor({ customConfig: '',language: 'fa', skin: 'v2' });
        });
   </script>  

   <script>
       $(document).ready(function() {
           $('#Editor').ckeditor();
       });
	   $(document).ready(function() {
            $('#Editor').ckeditor({ customConfig: '',language: 'fa', skin: 'v2' });
        });
   </script> 
</body>
</html>
