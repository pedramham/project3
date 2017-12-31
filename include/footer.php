    <?php
     $posation='about_us';
	$query_product = "select m_about_us_titre,m_about_us_subject
	,m_email,m_tellephon,m_mobailphon,m_addres from m_page_defult where posation=:posation
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
    }
    ?>
<div class="footer-wrapper">
  <div class="footer-top"></div>
  <div class="footer-center">
    <div class="footer-content-left">
      <h1><?php echo $m_about_us_titre ?></h1>
      <p><?php echo $m_about_us_subject ?></p>
    </div>
    <div class="footer-content-right">

      <h2>آدرس</h2>
      <p><?php echo $m_addres ?></p>
      <h3>ایمیل: info@untitled.com</h3>
      <h3>تلفن: (800) 555-0000</h3>
    </div>
  </div>
  <div class="footer-bottom"></div>
</div>
<div class="clear"></div>
<div class="copyrights">Copyright (c) 
  <div class="copyrights-bottom"></div>
</div>