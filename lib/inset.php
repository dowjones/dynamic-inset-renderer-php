<?php

  class inset {

    public $url;
    public $inset_data;
    public $inset_template;
    protected $mustache;

    //set defaults
    function __construct(){
      $baseDir = 'lib/mustache.php';
      require($baseDir.'/src/Mustache/Autoloader.php');
      Mustache_Autoloader::register();
      $this->mustache = new Mustache_Engine;
    }

    //fetch function externalized from render function
    //to allow for better future fetching, caching etc
    protected function _fetch($asset) {
      return file_get_contents($asset);
    }

    //public function to render mustache templates
    public function combine($template, $data) {
      return $this->mustache->render($template,$data);
    }

    //public function to render an inset from a url
    public function render($url = null) {
      $inset = json_decode($this->_fetch(isset($url) ? $url : $this->url));
      $this->inset_data = isset($inset->serverside->data->data) ? $inset->serverside->data->data : json_decode($this->_fetch($inset->serverside->data->url));
      $this->inset_template = isset($inset->serverside->template->template) ? $inset->serverside->template->template : $this->_fetch($inset->serverside->template->url);
      return $this->combine($this->inset_template,$this->inset_data);
    }

  }
