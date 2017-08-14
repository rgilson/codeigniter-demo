<?php
echo '<h2>'.$news_item['news_title'].'</h2>';
echo $news_item['mytext'];
?>
<p><a href="<?=base_url('index.php/news')?>">
Back to Home Page</a>
</p>
<br>