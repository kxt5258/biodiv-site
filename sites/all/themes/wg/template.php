<?php
function phptemplate_preprocess_page(&$vars) {
  include_once("readConfig.php");
  $config = readConfig();
  $vars['scripts'] = $config['scripts'] . $vars['scripts'];
  $vars['styles'] = $config['styles'] . $vars['styles'];

  $suggestions = array();
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));

    if(stristr($alias, "layer/")) {
      $suggestions = array();
      $suggestions[] = "page-layer";
      $vars['template_files'] = $suggestions;
    }

    //if(stristr($alias, "map")) {
    if($alias == "map") {
      $suggestions = array();
      $suggestions[] = "page-map";
      $vars['template_files'] = $suggestions;
    }
    
    //strlen check can be removed, just a bit more stringent check
    if(strpos($alias, 'biodiv') !== false) {
      $suggestions = array();
      $suggestions[] = "page-minimalistic";
      $vars['template_files'] = $suggestions;
    }

    if(strpos($alias, 'feedback_wgp') !== false) {
      $suggestions = array();
      $suggestions[] = "page-minimalistic";
      $vars['template_files'] = $suggestions;
    }

  }
}

function wg_node_submitted($node) {
  $uid = $node->uid;
  $user_info = array('uid' => $uid);
  $author = user_load($user_info);
  
  if(in_array('editorial team', array_values($author->roles))) {
   return t('Submitted by !username , Content Support on @datetime',
    array(
      '!username' => theme('username', $node),
      '@datetime' => format_date($node->created),
    ));

  }
  else   {
    return t('Submitted by !username on @datetime',
    array(
      '!username' => theme('username', $node),
      '@datetime' => format_date($node->created),
    ));
  }
}  
