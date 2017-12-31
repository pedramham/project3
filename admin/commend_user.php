<?php include "include/hedear.php";
?>
<body>
   <div class="container">
<div class="container" >
<?php include "include/menu.php";
?>
<?php
include "function/function.php";
include "../include/db.php";
$DBM=new Database;
$DBM->connect();
?>
   <div class="col-md-12 tab_back top-80">
      <div class="panel panel-default margin_top" style="background-color: rgba(227, 235, 252, 0.45);">
		<div class="header_box text_persian" style="background-color: #00E667;font-family: tahoma;color: #AF0900;">
		مدیریت اخبار سایت
		</div>

        <div class="col-md-12 float-right">
	    <table class="table table-bordered" style="text-align: right;">
	<thead>
	<tr>
		<th class="td_box_product">اعمال تغییرات </th>
		<th class="td_box_product">تاریخ ارسال</th>
		<th class="td_box_product">ایمیل</th>
		<th class="td_box_product">تلفن</th>
		<th class="td_box_product">نام کاربر</th>
		<th class="td_box_product">متن پیام </th>
		<th class="td_box_product">شماره نظر</th>
	</tr>
	</thead>
    <tbody>
	<?php 
	$m_lang=$_GET['lang'];
	$query_edit = "select m_id,m_date,m_name,m_email,m_message from message_user order by m_id desc;";
	$querys = $DBM->dbh->prepare($query_edit);
	$querys->execute();
	while($row = $querys->fetch(PDO::FETCH_ASSOC)){
	$m_id = $row['m_id'];
	$m_date = $row['m_date'];
	$m_name = $row['m_name'];
	$m_email= $row['m_email'];
	$m_message= $row['m_message'];
    ?>
      <tr>
        <td class="td_box_product2">
	    <form method="POST" action="#" style="float: left;padding: 5px;">
        <input class="btn btn-danger btn-xs fontbutton"  type="button" onClick="confirmDelete('?del=1&id=<?php echo $m_id;?>&lang=<?php echo $m_lang ?>')" value="خذف پیام"  align="right"/> 
	    </form>
		</td>
	    <td class="td_box_product2"><?php echo $m_date ?></td>
		<td class="td_box_product2"><?php echo $m_email ?></td>
		<td class="td_box_product2"><?php echo $m_tellephon ?></td>
        <td class="td_box_product2"><?php echo $m_name ?></td>
		<td class="td_box_product2"><?php echo $m_message ?></td>
        <td class="td_box_product2"><?php echo $m_id ?></td>
      </tr>
  
  <?php } ?>
    </tbody>
  </table>
		</div>
	<br>
	<br>
	</div>
	</div>
	<?php
	$delet=$_GET['del'];
	if($delet==1)
	{
	$id=$_GET['id'];
	$query_del=" delete from message_user WHERE m_id=$id";
	$stmt=$DBM->dbh->prepare($query_del);
	$stmt->execute();
	}
	?>
      	<script>
	function confirmDelete(url) {
	if (confirm("از حذف این اطلاعات مطمئن هستید بهچ وجه قابل بازشگت نیست ?")) {
	window.open(url, "_self");
	} else {
	false;
	}       
	}
	</script>
	
	
</div>
</div>
</div>
</div>
</div>


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
                   ArrayCoding Standards