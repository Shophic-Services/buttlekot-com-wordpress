<!--.footer-columns -->
<?php if (is_active_sidebar('footer') || is_active_sidebar('footer_columns_three') || is_active_sidebar('footer_columns_tow') || is_active_sidebar('footer_columns_four')) { ?>
  <section class="l-footer-columns">
    <h3 class="hide"><?php echo esc_html__('Footer', 'copallyt'); ?></h3>
    <div class="row">
      <section class="block">
        <?php
        if (copallyt_get_option('wd_footer_columns') == 'one_columns') {
          $column_one = 12;
          $column_tow = '';
          $column_three = '';
          $column_four = '';

        } elseif (copallyt_get_option('wd_footer_columns') == 'tow_a_columns') {
          $column_one = 6;
          $column_tow = 6;
          $column_three = '';
          $column_four = '';
        } elseif (copallyt_get_option('wd_footer_columns') == 'tow_b_columns') {
          $column_one = 4;
          $column_tow = 8;
          $column_three = '';
          $column_four = '';
        } elseif (copallyt_get_option('wd_footer_columns') == 'tow_c_columns') {
          $column_one = 8;
          $column_tow = 4;
          $column_three = '';
          $column_four = '';

        } elseif (copallyt_get_option('wd_footer_columns') == 'three_columns') {
          $column_one = 4;
          $column_tow = 4;
          $column_three = 4;
          $column_four = '';
        } else {
          $column_one = 3;
          $column_tow = 3;
          $column_three = 3;
          $column_four = 3;
        }
        ?>
        <div class="large-<?php echo esc_attr($column_one) ?> columns">
          <?php

          dynamic_sidebar('footer')  ?>
        </div>
        <?php if (copallyt_get_option('wd_footer_columns') == 'tow_a_columns' or copallyt_get_option('wd_footer_columns') == 'four_columns' or copallyt_get_option('wd_footer_columns') == 'three_columns' or copallyt_get_option('wd_footer_columns') == 'tow_b_columns' or copallyt_get_option('wd_footer_columns') == 'tow_c_columns') { ?>
          <div class="large-<?php echo esc_attr($column_tow) ?> columns">
            <?php
            dynamic_sidebar('footer_columns_tow') ?>
          </div>
        <?php }
        ?>

        <?php if (copallyt_get_option('wd_footer_columns') == 'three_columns' or copallyt_get_option('wd_footer_columns') == 'four_columns') { ?>

          <div class="large-<?php echo esc_attr($column_three) ?> columns">

            <?php
          dynamic_sidebar('footer_columns_three') ?>
          </div>
        <?php } ?>

        <?php if (copallyt_get_option('wd_footer_columns') == 'four_columns') { ?>

          <div class="large-<?php echo esc_attr($column_four) ?> columns">

            <?php
            dynamic_sidebar('footer_columns_four')?>
          </div>
        <?php } ?>
      </section>
    </div>
  </section>
<?php } ?>
<!--/.footer-columns-->

<!--.l-footer-->
<footer class="l-footer">
  <div class="row">
    <div class="footer medium-6 large-4 columns">
      <section class="block">
        <?php echo html_entity_decode(copallyt_get_option('wd_poweredby', 'Powered by Copallyt Theme')) ?>
      </section>
    </div>
    <div class="medium-6 large-4 columns">
      <?php
      $socialmediaicon_arry = explode(' ', copallyt_get_option('social_icon'));
      $socialmedia_arry = explode(' ', copallyt_get_option('socialmedia_name'));
      if (!empty($socialmedia_arry[0])) {
        ?>
        <ul class="footer-social-media">
          <?php
          $i = 0;
          foreach ($socialmedia_arry as $social_data) {
            $i++;
            ?>
            <li class="">
            <a href="<?php echo esc_url($social_data) ?>"><i
                class="fa <?php echo esc_attr($socialmediaicon_arry[$i - 1]) ?>"></i></a>
            </li><?php
          }
          ?>
        </ul>
        <?php
      }
      ?>
    </div>
    <div class="copyright medium-6 large-4 columns">
      <?php echo html_entity_decode(copallyt_get_option('wd_copyright', '&copy; 2020 Copallyt All rights reserved. ')); ?>
    </div>
  </div>
</footer>
<!--/.footer-->

<!--/.page -->

<?php
$menu_style = copallyt_get_option('wd_menu_style');
if ($menu_style == "offcanvas") { ?>
  <a class="exit-off-canvas"></a>
<?php } ?>
<!-- end offcanvas -->


<?php wp_footer(); ?>
</body>
</html>