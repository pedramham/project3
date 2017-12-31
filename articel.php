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
		$m_id=$_GET['news'];
		$str=explode("=","product=".$m_id);
		$m_id3 = $str[1];
		$m_id=base64_decode($m_id3);
		$querys = "select m_id,m_title,m_subject from m_news WHERE m_id=:m_id ";
		$querys = $DBM->dbh->prepare($querys);
		$querys->bindValue(':m_id',$m_id, PDO::PARAM_INT);
		$querys->execute();
		while($row = $querys->fetch(PDO::FETCH_ASSOC)){
		$m_id = $row['m_id'];
		$m_title = $row['m_title'];
		$m_subject = $row['m_subject'];
}

	?>
  <div class="right-column-content line_heigh" style="padding: 20px;" >
    <h4><?php echo $m_title ?></h4>
    <br>
    <p><?php echo $m_subject ?></p>


  </div>

</div>
</div>
</div>
<?php include "include/footer.php" ?>
</body>
</html>
