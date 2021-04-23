<?php

get_header(); ?>

 <div class="breadcrumbs">
      <div class="container">
        <div class="row">
      <div class="col-xs-12">
       <?php $MagikAspire->magikAspire_breadcrumbs(); ?>
      </div>       
     </div>
     </div>
      </div>

<div class="content-wrapper">
    <div class="container">
       
        <div class="page-title">
      <h2 class="entry-title">
        <?php $MagikAspire->magikAspire_page_title(); ?>
      </h2>
        </div>
        
        <div class="std">
            <div class="page-not-found wow bounceInRight animated">
                <h2><?php  esc_attr_e('404','aspire') ;?></h2>

                <h3><img src="<?php echo esc_url(MAGIKASPIRE_THEME_URI) . '/images/signal.png'; ?>"
                         alt="<?php  esc_attr_e('404! Page Not Found','aspire') ;?>">
                         <?php  esc_attr_e('Oops! The Page you requested was not found!','aspire') ;?></h3>

                <div><a href="<?php echo esc_url(get_home_url()); ?>" type="button"
                        class="btn-home"><span><?php  esc_attr_e('Back To Home','aspire') ;?></span></a></div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

