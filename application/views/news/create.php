
<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('news/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />
    <label for="text">Text</label>
    <textarea name="mytext"></textarea><br />
    <input type="submit" name="submit" value="Create news item" />
	</form>
	
<p><a href="<?=base_url('index.php/news')?>">
Back to News Archive</a></p>
<br>