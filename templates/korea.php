<?php

/*
*
* Template Name: Korean Life Page

*/

?>

<?php
get_header();
?>
<div class="container">
  <main id="site-content" class="row" role="main">

  	<?php

  	if ( have_posts() ) {

  		while ( have_posts() ) {
  			the_post();

  			// get_template_part( 'template-parts/content-cover' );
  		}
  	}

  	?>

  </main><!-- #site-content -->
  <div id="extra-posts" class="row" role="main">
    <?php
    global $more;
    $more = 0;
    query_posts('cat=6');
  	if ( have_posts() ) { ?>
      <!-- <div class="row"> -->
      <div class="w-100">
        <h2>Posts about Korea</h2>
      </div>
      <?php
  		while ( have_posts() ) {
      ?>
        <div class="card col-md-5" style="width: 18rem;">
          <div class="card-body">
            <?php
              the_post();
              $post_slug = get_post_field( 'post_name', get_post() );

              $id = get_the_ID();
              $post_title = the_title();
            ?>
            <?php
              echo '<h5 class="card-title">'.$post_title.'</h5>';
            ?>
            <!-- Button trigger modal -->
            <?php
              echo '
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$post_slug.'">
                  Visit '.$post_title.'
                </button>
              ';
            ?>
            <!-- Modal -->
            <?php
              echo '
                <div class="modal fade" id="'.$post_slug.'" tabindex="-1" role="dialog" aria-labelledby="'.$post_slug.'Label" aria-hidden="true">
              ';
            ?>
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <?php
                      echo '
                        <h5 class="modal-title" id="'.$post_slug.'Label">'.$post_title.'</h5>
                      ';
                    ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                      the_content();
                      /*get_template_part( 'template-parts/content', get_post_type() );*/
                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> <!-- end .modal-footer -->
                </div> <!-- end .modal-content -->
              </div> <!-- end .modal-dialog -->
            </div> <!-- end .modal -->
          </div> <!-- end card-body -->


        </div> <!-- end .col-md-5 -->
        <?php
  		}
      /*end of while loop*/ ?>
      <!-- </div> <! end .row -->
    <?php
    /*end of if statement */ }
    ?>
  </div>
</div>
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
