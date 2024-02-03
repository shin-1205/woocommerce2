<!DOCTYPE html>

<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/style.css">


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <header>
      <section class="search">
        <div class="container">
          <div class="text-center d-md-flex align-items-center">

          </div>
        </div>
      </section>
      <section class="top-bar">
        <div class="container">
          <div class="row">
            <?php if(class_exists('WooCommerce')); ?>
            <div class="brand col-md-3 col-12 col-lg-2 text-center text-md-left">
              <?php the_custom_logo(); ?>
            </div>
            <div class="second-column col-md-9 col-12 col-lg-10">
              <div class="row">
                <div class="acount col-12">
                  <div class="navbar-expand">
                    <ul class="navbar-nav float-left">
                      <li>
                        <a href="<?php echo home_url('/') ?>">
                          <?php if( has_custom_logo()):?>
                          <?php get_search_form(); ?>
                          <?php else: ?>
                          <p class="site-title"><?php bloginfo('title')?></p>
                          <!-- <span><?php bloginfo('discription'); ?></span> -->
                          <?php endif; ?>
                        </a>
                      </li>
                      <?php if(is_user_logged_in()): ?>
                      <li>
                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>"
                          class="nav-link">My Account</a>
                      </li>
                      <li>
                        <a href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id')))) ?>"
                          class="nav-link">Logout</a>
                      </li>
                      <?php else: ?>
                      <li>
                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>"
                          class="nav-link">Login / Register</a>
                      </li>
                      <?php endif; ?>
                      <!-- Add a link to the WooCommerce shop page -->
                      <li>
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))) ?>" class="nav-link">Shop</a>
                      </li>
                      <li>
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('cart'))) ?>" class="nav-link">Cart</a>
                      </li>
                      <li>
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('checkout'))) ?>"
                          class="nav-link">Cehckout</a>
                      </li>

                      <li>
                        <div class="text-center d-md-flex align-items-center">
                          <?php get_search_form(); ?>
                        </div>
                      </li>
                    </ul>

                  </div>
                  <div class="cart text-right">
                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"></span></a>
                    <span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </header>