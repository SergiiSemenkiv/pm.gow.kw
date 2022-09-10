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
/**
 * ACF field groups
 */
if( function_exists('acf_add_local_field_group') )
{
//  acf_add_local_field_group(array(
//    'key' => 'administration_member',
//    'title' => 'Administration Member',
//    'fields' => array (
//      array (
//        'key' => 'name',
//        'label' => 'Name',
//        'name' => 'name',
//        'type' => 'text',
//      ),
//      array (
//        'key' => 'position',
//        'label' => 'Position',
//        'name' => 'position',
//        'type' => 'text',
//      ),
//      array (
//        'key' => 'message',
//        'label' => 'Message',
//        'name' => 'message',
//        'type' => 'text',
//      ),
//      array (
//        'key' => 'hero_image',
//        'label' => 'Hero image',
//        'name' => 'hero_image',
//        'type' => 'image',
//      )
//    ),
//    'location' => array (
//      array (
//        array (
//          'param' => 'post_type',
//          'operator' => '==',
//          'value' => 'administration',
//        ),
//      ),
//    ),
//  ));
}

