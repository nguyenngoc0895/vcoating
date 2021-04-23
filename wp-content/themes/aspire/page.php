<?php
get_header();
$magikAspire_breadcrumb_status = get_post_meta($post->ID, 'magikAspire_show_breadcrumb', true);
$design = get_post_meta($post->ID, 'magikAspire_page_layout', true);

$leftbar = $rightbar = $main = '';

switch ((int)$design) {
    case 1:
        $rightbar = 'hidesidebar';
        $main = 'col2-left-layout';
        $col = 9;
        break;
    case 2:
        $leftbar = 'hidesidebar';
        $main = 'col2-right-layout';
        $col = 9;
        break;

    case 4:
        $main = 'col3-layout';
        $col = 6;
        break;

    default:
        $leftbar = $rightbar = 'hidesidebar';
        $main = 'col1-layout';
        $col = 12;
        break;

}

?>
    <?php if ($magikAspire_breadcrumb_status == 1) { ?>
 <div class="breadcrumbs">
      <div class="container">
        <div class="row">   
      <div class="col-xs-12">
       <?php $MagikAspire->magikAspire_breadcrumbs(); ?>
      </div>
     </div>
     </div>
      </div>       
    <?php } ?>


<div class="main-container <?php echo esc_html($main) ?> wow bounceInUp">
  <div class="main container">
    <div class="row">
    <?php if (empty($leftbar) && $leftbar != 'hidesidebar') { ?>
    <aside id="column-left" class="col-left sidebar col-sm-3 col-xs-12<?php echo esc_html($leftbar) ?>">
      <?php dynamic_sidebar('sidebar-content-left'); ?>
    </aside>
    <?php } ?>
    <div class="col-sm-<?php echo esc_html($col); ?>" id="content">
      <div class="col-main">
     
       <div class="static-contain">
       
         <div class="page-title">
      <h2 class="entry-title">
        <?php $MagikAspire->magikAspire_page_title(); ?>
      </h2>
        </div>
      
      <?php while (have_posts()) : the_post(); ?>
    
      <?php if (is_search()) : // Only display Excerpts for Search ?>
      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div>
      <!-- .entry-summary -->
      <?php else : ?>
      <div class="page-content">
        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'aspire'), 'after' => '</div>')); ?>
      </div>
      <!-- .entry-content -->
      <?php endif; ?>
      <?php endwhile; // end of the loop. ?>
      <?php
                if (comments_open())
                    comments_template(); ?>
    </div>
    </div>

   </div>

    <?php if (empty($rightbar) && $rightbar != 'hidesidebar') { ?>
    <aside id="column-right" class="col-right sidebar col-sm-3 col-xs-12<?php echo esc_html($rightbar) ?>">
      <?php dynamic_sidebar('sidebar-content-right'); ?>
    </aside>
    <?php } ?>
  </div>
  </div>
</div>
<?php get_footer(); ?>
