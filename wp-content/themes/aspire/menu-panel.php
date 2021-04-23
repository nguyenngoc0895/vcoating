<div id="nav-panel" class="">
    <?php
    // show top navigation and mobile menu
         $MagikAspire = new MagikAspire();
     
        echo magikAspire_mobile_search();
        echo '<div class="menu-wrap">';
      
        echo magikAspire_mobile_menu().'</div>';

   
        echo '<div class="menu-wrap">'.magikAspire_mobile_top_navigation().'</div>';
    ?>
</div>