<!-- application/views/ajax/index.php-->

<p><?=$ajaxdata?></p>
<?php foreach ($news as $news_item): ?>
			<h3><?php echo $news_item['news_title'];?></h3>
		   <p> <?php echo $news_item['mytext']; ?></p>				
			<p><a href="<?php echo site_url('news/view/'.$news_item['slug']); ?>">View article</a></p>
			<?php endforeach; ?>