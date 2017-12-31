


<div class="light-panel">
        <div class="light-panel-top"></div>
        <div class="light-panel-center">
          <h1>آخرین مطالب ارسالی</h1>
          <ul>
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
            <li><a href="nilo<?php echo $m_link_news ?>" target="_blank"><?php echo $m_title?></a></li>

    <?php } ?>
          </ul>
        </div>
        <div class="light-panel-bottom"></div>
      </div>