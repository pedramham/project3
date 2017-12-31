    <?php
    include "include/db.php";
    $DBM=new Database;
    $DBM->connect();
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
<div class="logo-menu-container">
<div class="logo"><img src="<?php echo $m_pic_logo ?>" width="90px" height="90px" alt="" /></div>
  <div class="menu">
    <ul>
    <li><a href="contact_us.php">تماس با ما</li>
    <li><a href="about_us.php">درباه ما</li>
    <li><a href="#">ليست مطالب </a></li>
    <li><a href="index.php" class="active">صفحه اصلي</a></li>
    </ul>
  </div>
</div>