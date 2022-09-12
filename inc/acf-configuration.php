<?php
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Theme General Settings',
    'menu_title' => 'Theme Settings',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Theme Custom Pages Content',
    'menu_title' => 'Theme Custom Pages Content',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Theme Custom Sections Content',
    'menu_title' => 'Theme Custom Sections Content',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Administration Page',
    'menu_title' => 'Administration Page',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Statistics Section',
    'menu_title' => 'Statistics Section',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Administration Section',
    'menu_title' => 'Administration Section',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Subscribe Section',
    'menu_title' => 'Subscribe Section',
    'parent_slug' => 'theme-general-settings',
  ));
}
