<?php

class SupertempVideoUrlParser extends stdClass {

  public function SupertempVideoUrlParser($url='', $autoplay = '') {

    $this->url = $url;
    $this->autoplay = $autoplay;
    
    $this->service = $this->set_service();
    $this->id = $this->set_id();
    $this->embed_url = $this->set_embed_url();
    $this->embed_code = $this->set_embed_code();
    $this->error = $this->set_error();
  }

  public function get_service() { return $this->service; }
  private function set_service() {

    if (preg_match('/youtube|youtu\.be/i', $this->url))
      return 'youtube';

    if (preg_match('/vimeo/i', $this->url))
      return 'vimeo';

    return '';
  }
  
  public function get_id() { return $this->id; }
  private function set_id() {

    if ($this->service === 'youtube')
      return $this->get_youtube_id();

    if ($this->service === 'vimeo')
      return $this->get_vimeo_id();

    return '';
  }

  public function get_embed_url() { return $this->embed_url; }
  private function set_embed_url() {

    if ('youtube' === $this->service)
      return $this->get_youtube_embed_url();

    if ('vimeo' === $this->service)
      return $this->get_vimeo_embed_url();

    return '';
  }

  public function get_embed_code() { return $this->embed_code; }
  private function set_embed_code() {

    if ('youtube' === $this->service)
      return $this->get_youtube_embed_code();

    if ('vimeo' === $this->service)
      return $this->get_vimeo_embed_code();

    return '';
  }

  public function get_error() { return $this->error; }
  private function set_error() {
    return (!$this->service || !$this->id);
  }

  private function get_youtube_id() {
    $key_from_params = $this->parse_url_for_params(array('v','vi'));
    if ($key_from_params) return $key_from_params;
    return $this->parse_url_for_last_element();
  }
  
  private function get_vimeo_id() {
    return $this->parse_url_for_last_element();
  }

  private function get_youtube_embed_url() {
    return "http://youtube.com/embed/" . $this->id . "?autohide=0&autoplay=" . ($this->autoplay ? '1' : '0');
  }

  private function get_vimeo_embed_url() {
    return "http://player.vimeo.com/video/" . $this->id . "?title=0&byline=0&portrait=0&autoplay=" . ($this->autoplay ? '1' : '0');
  }

  private function get_youtube_embed_code() {
    return '<iframe src="'. $this->embed_url .'" width="560" height="315" frameborder="0" allowfullscreen></iframe>';
  }

  private function get_vimeo_embed_code() {
    return '<iframe src="'. $this->embed_url .'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
  }

  private function parse_url_for_params($target_params) {

    parse_str( parse_url($this->url, PHP_URL_QUERY), $my_array_of_params );

    foreach ($target_params as $target) {
      if (array_key_exists ($target, $my_array_of_params)) {
        return $my_array_of_params[$target];
      }
    }

    return '';
  }

  function parse_url_for_last_element() {
    $exploded_url = explode("/", $this->url);
    $prospect = end($exploded_url);
    $prospect_and_params = preg_split("/(\?|\=|\&)/", $prospect);
    return ($prospect_and_params) ? $prospect_and_params[0] : $prospect;
  }
}
 ?>
