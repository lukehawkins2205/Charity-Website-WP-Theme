this is the generic screen. 


<?php 

while(have_posts(  )){
    the_post(); ?>
    <h2>TITLE HERE<?php the_title()?></h2>
    <?php the_content(); ?>
  
    <?php
}

?>