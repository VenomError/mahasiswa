

<?php

use library\MainController;

class LoginController extends MainController
{
  function __construct()
  {
    parent::__construct();
    $this->component = [
      'footer' => 'components/footer',
      'header' => 'components/header',
    ];
    $this->getPage('Dashboard');
  }
  public function index()
  {
    $data = [
      "title" => "Login",
      "page" => "Dashboard",
    ];
    $this->template('login', $data, 'login', $this->component);
  }
}
