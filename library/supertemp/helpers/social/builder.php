<?php

  class SocialBuilder {

    public static function googleplus($config = array()) {
      $defaults = require('defaults.php');
      $defaults = $defaults['googleplus'];
      $params = array();
      $params['title'] = (isset($config['title'])) ? $config['title'] : '';
      $params['url'] = (isset($config['url'])) ? $config['url'] : '';

      return self::buildObj($defaults, $params);
    }


    public static function twitter($config = array()) {
      $defaults = require('defaults.php');
      $defaults = $defaults['twitter'];
      $params = array();
      $params['title'] = (isset($config['title'])) ? $config['title'] : '';
      $params['text'] = (isset($config['title'])) ? $config['title'] : '';
      $params['url'] = (isset($config['url'])) ? $config['url'] : '';
      $params['via'] = (isset($config['via'])) ? $config['via'] : 'supertemp';

      return self::buildObj($defaults, $params);
    }


    public static function facebook($config = array()) {
      $defaults = require('defaults.php');
      $defaults = $defaults['facebook'];
      $params = array();
      $params['title'] = (isset($config['title'])) ? $config['title'] : '';
      $params['url'] = (isset($config['url'])) ? $config['url'] : '';
      $params['app_id'] = 762201153924019;
      $params['display'] = 'popup';

      return self::buildObj($defaults, $params);
    }


    public static function linkedin($config = array()) {
      $defaults = require('defaults.php');
      $defaults = $defaults['linkedin'];
      $params = array();
      $params['title'] = (isset($config['title'])) ? $config['title'] : '';
      $params['url'] = (isset($config['url'])) ? $config['url'] : '';
      $params['text'] = (isset($config['text'])) ? $config['text'] : '';

      return self::buildObj($defaults, $params);
    }

    // Constructs each share entity model
    public static function buildObj($defaults, $params = array()) {
      $params['url'] = self::buildUrl($defaults, $params);
      return array_merge($defaults, $params);
    }

    // Builds complete url with encoded values
    public static function buildUrl($defaults, $params = array()) {
      $url = $defaults['_url'];
      $query = array();

      foreach ($params as $key => $val) {
        if (!isset($defaults['_params'][$key])) continue;
        $query[] = $key.'='.urlencode($val);
      }

      return $url . implode('&', $query);
    }

  } // End SocialBuilder