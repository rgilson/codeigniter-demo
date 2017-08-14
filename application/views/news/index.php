<div class="container-fluid" >
    <div class="row">
	    <div class="col-sm-12" style="background-color:#ccffb3;">
			<h2> Ajax Search</h2>
				<script>// This is the jQuery Ajax call
					function doSearch() { $.ajax({
						type: "GET",
						url:"http://mi-linux.wlv.ac.uk/~1326204/codeigniter2/index.php/ajax/getdata/" + $("#mysearch").val(),
						success:function(result){$("#searchresults").html(result);}
						});
					}
				</script>
			<!-- Search box -->
			<label for="news_title">Search by news title </label>			
			<input type="text" id="mysearch" placeholder="Search">
			<input type="button" id="searchbutton" value="Search" onClick="doSearch();">

			<div id="searchresults"></div>		
		</div>
		
		<!-- Insert news section -->
        <div class="col-sm-4" style="background-color:lavender;">
		   <?php echo validation_errors(); ?>

           <?php echo form_open('news/index'); ?>
			<h2>Add News</h2>
			
     		 <form id="addnews" action="<?=base_url("index.php/news/create")?>" method="post">			 
			<h4><label for="news_title">Title</label></h4>
			<p><input type="input" name="news_title" /></p>
			<h4><label for="mytext">Text</label></h4>
			<p><textarea name="mytext"></textarea><br /></p>
			<p><input type="submit" name="submit" value="Create news item" /></p>
			</form>
		</div>
		
	
		<div class="col-sm-8" style="background-color:lavenderblush;">
			<h2>News Archive</h2>
			
			<p>
			<!-- loops and displays all news items stored in the db -->
			<?php foreach ($news as $news_item): ?>
			<h3><?php echo $news_item['news_title']; ?></h3>
				<p>
				    <?php echo $news_item['mytext']; ?>
				</p>
				
			<p><a href="<?php echo site_url('news/view/'.$news_item['slug']); ?>">View article</a></p>
			<?php endforeach; ?>
			</p>
			<p><a href="<?=base_url('index.php/news/create')?>">Link to Create News</a>
			</p>
		</div>
	
</div>




