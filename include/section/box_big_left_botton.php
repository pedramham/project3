
  					<?php

						$query_edit = "select m_title,m_subject,m_link_news from m_news
						WHERE m_posation='m_news' order by m_id desc ;";
						$query_edit = $DBM->dbh->prepare($query_edit);
						$query_edit->execute();
						while($row = $query_edit->fetch(PDO::FETCH_ASSOC)){
						$m_link_news = $row['m_link_news'];
						$m_title = $row['m_title'];
						$m_subject = $row['m_subject'];

						?>
<div class="right-column-content">
        <div class="right-column-content-content">
          <p><?php echo $m_title ?></p>
          <div class="button"><a href="nilo<?php echo $m_link_news ?>" >بیشتر بخوانید</a></div>
        </div>
        <div class="right-column-content-img-right"> <img src="images/946photoshop.png" alt="banner" /> </div>
      </div>
      <?php    } ?>