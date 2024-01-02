<?php

namespace library;

use Controller;



class UserController extends Controller
{
  protected $msg = array();
  protected $headLoc = "";
  protected $navLoc = "";
  protected $footLoc = "";
  protected $contentLoc = "";
  protected $component = array();
  public $page = "";
  public function __construct()
  {
    if (isset($_SESSION['username']) && $_SESSION['password']) {
      $this->redirect('admin');
    }
  }

  public function getPage($viewName)
  {
    $this->page = $viewName;
  }
  public function headerIn($viewName, $data = array())
  {
    $this->headLoc = $viewName;
    return $this;
  }
  public function message($name, $value = '')
  {
    $this->msg[$name] = $value;
  }
  public function contentIn($viewName, $template, $data = array())
  {
    $this->contentLoc = $viewName;
    return $this;
  }
  public function navbarIn($viewName, $data = array())
  {
    $tmp = $this->view($viewName);
    $tmp->bind('navbar', $viewName);
    $tmp->bind('data', $data);
    $tmp->bind('tes', $this->msg);
    $tmp->render();
  }
  public function template($viewName, $data = array(), $content = 'index', $view = array())
  {
    $tmp = $this->view($viewName);
    foreach ($view as $key => $value) {
      $tmp->bind($key, $value);
    }
    $tmp->bind('data', $data);
    $tmp->bind('content', $content);
    $tmp->bind('tes', $this->msg);
    $tmp->render();
  }
  public function footerIn($viewName, $data = array())
  {
    $this->footLoc = $viewName;
    return $this;
  }
}
