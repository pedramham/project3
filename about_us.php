<?php include "include/header.php" ?>
<body>
<div class="wrapper">
<?php include "include/menu.php" ?>
<?php include "include/header_top.php" ?>
<?php include "include/slider.php" ?>
<div class="left-column">
<?php include "include/section/box_right_top.php" ?>
<?php include "include/section/box_right_midell.php" ?>
<?php include "include/section/box_right_botton.php" ?>
</div>
<div class="right-column">
    <?php
     $posation='about_us';
	$query_product = "select m_about_us_subject
     from m_page_defult where posation=:posation
	order by m_id desc LIMIT 1";
	$query_product = $DBM->dbh->prepare($query_product);
	$query_product->bindValue(':posation', $posation, PDO::PARAM_STR);
	$query_product->execute();

	while($row_file = $query_product->fetch(PDO::FETCH_ASSOC)){
	$m_about_us_subject=$row_file['m_about_us_subject'];
    }
    ?>
  <div class="right-column-content line_heigh" style="padding: 20px;" >

    <p><?php echo $m_about_us_subject ?></p>


  </div>

</div>
</div>
</div>
<?php include "include/footer.php" ?>
</body>
</html>
