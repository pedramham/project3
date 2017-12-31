<?php include "include/header.php" ?>
<body>
<div class="wrapper">
<?php include "include/menu.php" ?>
<?php include "include/header_top.php" ?>
<?php include "include/slider.php" ?>
<div class="left-column"> 
<?php include "include/section/box_right_midell.php" ?>
<?php include "include/section/box_right_botton.php" ?>
</div>
<div class="right-column">
    <?php
     $posation='about_us';
	$query_product = "select m_about_us_titre,m_countact_us_subject
	,m_email,m_tellephon,m_mobailphon,m_addres from m_page_defult where posation=:posation
	order by m_id desc LIMIT 1";
	$query_product = $DBM->dbh->prepare($query_product);
	$query_product->bindValue(':posation', $posation, PDO::PARAM_STR);
	$query_product->execute();

	while($row_file = $query_product->fetch(PDO::FETCH_ASSOC)){
	$m_about_us_titre=$row_file['m_about_us_titre'];
	$m_countact_us_subject=$row_file['m_countact_us_subject'];
	$m_email=$row_file['m_email'];
	$m_tellephon=$row_file['m_tellephon'];
	$m_mobailphon=$row_file['m_mobailphon'];
	$m_addres=$row_file['m_addres'];
    }
    ?>
  <div class="right-column-content line_heigh" style="padding: 20px;" >

    <p><?php echo $m_countact_us_subject ?></p>

    <ul class="about_us_ul">
      <li>
      <img src="images/blue-mail.png" width="20px" height="20px" alt="آموزش فتوشاپ" />
      <div class="title_about_us"><?php echo $m_email ?>  </div>
      </li>
      <li>
      <img src="images/mobile-icon.png" width="20px" height="20px" alt="آموزش فتوشاپ" />
      <div class="title_about_us"> <?php echo $m_mobailphon ?>  </div>
      </li>
      <li>
      <img src="images/telephone.png" width="20px" height="20px" alt="آموزش فتوشاپ" />
      <div class="title_about_us"><?php echo $m_tellephon ?>  </div>
      </li>
      <li>
      <img src="images/location.png" width="20px" height="20px" alt="آموزش فتوشاپ" />
      <div class="title_about_us"><?php echo $m_addres ?>   </div>
      </li>
    </ul>
  </div>
<form method="POST" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?category=12">
   <div class="right-column-content line_heigh" style="padding: 20px;" >
    <ul  class="about_us_ul">
    <li>
       نام <input id="fname" name="m_name" type="text"  style="margin-right: 15px;" >
    </li>
    <li>
      ایمیل  <input id="fname" name="m_email" type="text"  >
    </li>
    <li>
    پیغام<textarea  name="m_message" rows="7" cols="50"></textarea>

    </li>
    <li>
     <input  type="submit" value="ارسال">
</form>
    </li>
      <?php
$category=strip_tags($_GET['category']);
if($category==12)
{
   date_default_timezone_set('Asia/Tehran');
   $m_date= date("Y-m-d");
   $m_time= date("H:i:s");
   $m_name=htmlentities($_POST['m_name']);

		if (empty ($m_name)){
		 $payam1 = "برای ثبت نام حتما باید فیلد نام و نام خانوادگی پر شود";
        }
		$m_email=htmlentities($_POST['m_email']);
		if (empty ($m_email)){
		 $payam2="برای ثبت نام باید ایمیل خود را وارد کنید";
        }
		if (!filter_var($m_email,FILTER_VALIDATE_EMAIL))
		{
		 $payam3 ="خطا در فیلد ایمیل:لطفا ایمیل خود را بصورت صحیح وارد کنید";
        }
		$payamha = $payam1.$payam2.$payam3;
		$Errorha = strlen($payamha);
        $m_message = $_POST['m_message'];

			if($Errorha == 0)
			{
			echo $payam ;
			}
			else{

			echo '<div class=error_contact_us >',$payam1."<br>";
			echo $payam2."<br>";
			echo $payam3.'</div>';
			die();
			}
      $arraey=array($m_time,$m_date,$m_name,$m_email,$m_message);
      $queycomment="INSERT INTO message_user(m_time,m_date,m_name,m_email,m_message)
	  VALUES(?,?,?,?,?)";
	  $stmt=$DBM->dbh->prepare($queycomment);
	  foreach ($arraey as $key=>$value){
	  $stmt->bindvalue($key+1,$value);
	  }
	 // $stmt->bind_param('username','$m_author','$m_email','$m_comment','$data',0,'$m_url');

	  $stmt->execute();
	  $payam="پیغام شما ارسال شد";
      echo  $payam;
}
?>
    </ul>
    </div>

</div>
</div>
</div>
<?php include "include/footer.php" ?>
</body>
</html>
