 <footer>
   <nav class="footer-menu col-12 col-md-6 text-left text-md-right">
     <?php 
            wp_nav_menu(
              array(
                'theme_location' => 'fancy_lab_footer_menu'
              )
              );
           ?>
   </nav>
 </footer>
 <?php wp_footer(); ?>
 </body>

 </html>