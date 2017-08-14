
<html>
   <head>
      <meta charset="UTF-8">
      <title>Flickr Gallery</title>

      <link rel="stylesheet" href="<?=base_url('css/main.css')?>" />
      <!--<link rel="stylesheet" href="<?=base_url('css/helpers.css')?>" />
      <link rel="stylesheet" href="<?=base_url('css/layout.css')?>" />
      <link rel="stylesheet" href="<?=base_url('css/gallery.css')?>" />
      <link rel="stylesheet" href="<?=base_url('css/thumbnails.css')?>" />
      <link rel="stylesheet" href="<?=base_url('css/homepage.css')?>" />-->
   </head>
   <body>
      <header class="island">
         <h1>Flickr Gallery </h1>
		 
         <form class="js-form-search form-search" action="/search" method="get" role="search">
            <label for="query">Search:</label>
            <input type="search" name="query" id="query" placeholder="Search" required />
            <input type="submit" value="Search" />
         </form>
      </header>

      <div class="island">
         <div class="js-gallery gallery">
            <img src="" class="js-gallery__image" />
            <button class="js-gallery__arrow--left gallery__arrow gallery__arrow--left">
               <span class="visually-hidden">Previous photo</span>
            </button>
            <button class="js-gallery__arrow--right gallery__arrow gallery__arrow--right">
               <span class="visually-hidden">Next photo</span>
            </button>
         </div>
      </div>

      <div class="island thumbnails">
         <ul class="js-thumbnails__list thumbnails__list"></ul>
         <ol class="js-thumbnails__pager thumbnails__pager"></ol>
      </div>
	  
      <script src="<?=base_url('js/utility.js')?>"></script>
      <script src="<?=base_url('js/gallery.js')?>"></script>
      <script src="<?=base_url('js/flickr.js')?>"></script>
      <script src="<?=base_url('js/main.js')?>"></script>
   </body>
</html>