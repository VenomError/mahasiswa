

<?php

use library\UserController;

class LoginController extends UserController
{
  function __construct()
  {
    parent::__construct();
    $this->component = [
      'footer' => 'components/footer',
      'header' => 'components/header',
    ];
    $this->getPage('Login');
  }
  public function index()
  {
    $data = [
      "title" => "Login Page",
      "page" => "Login",
    ];
    $this->template('login', $data, 'login', $this->component);
  }
}
