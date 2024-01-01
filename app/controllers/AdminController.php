

<?php

use library\MainController;

class AdminController extends MainController
{
  function __construct()
  {
    parent::__construct();
    $this->component = [
      'navbar' => 'components/navbar',
      'footer' => 'components/footer',
      'header' => 'components/header',
      'sidebar' => 'components/sidebar',
    ];
    $this->getPage('Dashboard');
  }
  public function index()
  {
    $data = [
      "title" => "Dashboard",
      "navAdmin" => 'active',
      "page" => "Dashboard",
    ];
    $this->template('admin', $data, 'admin/index', $this->component);
  }
}