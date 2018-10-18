<?php
  class View
  {

    public $List = [
      "chat",
      "chien",
      "lapin",
      "vache",
    ];



    public $uri;
    public $path;
    public $head = "./animals/templates/head.html";
    public $foot = "./animals/templates/foot.html";

    public function __construct($uri)
    {
      $this->uri = $uri;
      $this->path = "./animals" . $uri . ".html";
    }

    public function createMenu($true = false){
      $menuElement = array_diff(scandir('./animals'),[
        ".",
        "..",
        "templates",
        "image",
        ]);

        if ($true) {
          arsort($menuElement);
        }

        $menu = "<div>";
        foreach ($menuElement as $key => $value) {
          $value = str_replace(".html", "", $value);
          $menu .= file_get_contents('./animals/' . $value . ".html");
        }
        $menu .= "</div>";
        return $menu;
      }
      public function renderView()
      {
        if(file_exists($this->path)){
        $content = file_get_contents($this->path);
      } elseif ($this->uri == "/" || $this->uri == "") {
        $content =  $this->createMenu();
      }
      if(in_array(substr($this->uri, 1), $this->List)) {
        echo file_get_contents($this->head) . $content . file_get_contents($this->foot);
      } else {
        $menuContent = "";
        echo file_get_contents($this->head) . $this->createMenu() . file_get_contents($this->foot);
      }
    }
  }
?>
