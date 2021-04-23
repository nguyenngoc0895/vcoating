<?php 

$MagikAspire = new MagikAspire();?>

 <!-- Footer -->
  <footer class="footer">
  
            
  <?php magikAspire_footer_signupform();?>

          
    <!--newsletter-->
    
    <div class="footer-middle">
      <div class="container">
        <div class="row">
      <?php if (is_active_sidebar('footer-sidebar-1')) : ?>
       <div class="col-md-3 col-sm-6">
            <div class="footer-column">
             <?php dynamic_sidebar('footer-sidebar-1'); ?>
            </div>
       </div>              
       <?php endif; ?>

          
         
          <?php if (is_active_sidebar('footer-sidebar-2')) : ?>
          <div class="col-md-3 col-sm-6">
                <div class="footer-column">
                <?php dynamic_sidebar('footer-sidebar-2'); ?>
               </div>
          </div>                
          <?php endif; ?>

         
          
              <?php if (is_active_sidebar('footer-sidebar-3')) : ?>
            <div class="col-md-3 col-sm-6">
            <div class="footer-column">
             <?php dynamic_sidebar('footer-sidebar-3'); ?>
              </div>
             </div>
            <?php endif; ?>
                
          
        
             <?php if (is_active_sidebar('footer-sidebar-4')) : ?>
               <div class="col-md-3 col-sm-6">
                 <?php dynamic_sidebar('footer-sidebar-4'); ?>

          </div>
                <?php endif; ?>

        </div>
      </div>
    </div>
    
    <?php magikAspire_footer_top(); ?>
  
    <?php magikAspire_footer_text(); ?> 
       
  </footer>
  <!-- End Footer -->
</div>
   
   
<div class="menu-overlay"></div>
<?php // navigation panel
require_once(MAGIKASPIRE_THEME_PATH .'/menu-panel.php');
 ?>
   
    <?php wp_footer(); ?>
    </body></html>
