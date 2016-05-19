<?php

$defaults = array(

  'googleplus' => array(
    'slug' => 'googleplus',
    'icon' => 'line-icon line-icon-socialmedia-16',
    'label' => 'Google+',
    'width' => 480,
    'height' => 665,
    '_url' => 'https://plus.google.com/share?',
    '_params' => array(
      'url' => false
    )
  ),

  'twitter' => array(
    'slug' => 'twitter',
    'icon' => 'line-icon line-icon-socialmedia-07',
    'label' => 'Twitter',
    'width' => 555,
    'height' => 215,
    '_url' => 'http://twitter.com/share?',
    '_params' => array(
      'url' => false,
      'via' => false,
      'text' => false,
      'hashtags' => false,
      'related' => false
    )
  ),

  'facebook' => array(
    'slug' => 'facebook',
    'icon' => 'line-icon line-icon-socialmedia-08',
    'label' => 'Facebook',
    'width' => 555,
    'height' => 370,
    '_url' => 'http://www.facebook.com/sharer.php?',
    '_params' => array(
      'u' => false,
      'app_id' => false,
      'display' => false
    )
  ),

  'linkedin' => array(
    'slug' => 'linkedin',
    'icon' => 'line-icon line-icon-socialmedia-05',
    'label' => 'Linkedin',
    'width' => 600,
    'height' => 465,
    '_url' => 'http://www.linkedin.com/shareArticle?mini=true&',
    '_params' => array(
      'url' => false,
      'title' => false,
      'text' => false,
      'source' => false
    )
  )
);

return $defaults;