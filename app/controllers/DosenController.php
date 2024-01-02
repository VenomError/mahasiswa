<?php

use library\MainController;

class DosenController extends MainController
{
  public function __construct()
  {
    parent::__construct();
    $this->component =
      [
        'navbar' => 'components/navbar',
        'footer' => 'components/footer',
        'header' => 'components/header',
        'sidebar' => 'components/sidebar',
      ];
    $this->getPage('Dosen');
  }

  public function index()
  {
    $data =
      [
        "title" => "Dosen",
        "navDosen" => "active",
        "page" => $this->page,
      ];
    $this->template('admin', $data, 'dosen/index', $this->component);
  }
}
