

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
    $this->template('login', $data, 'user/login', $this->component);
  }

  public function loginCheck()
  {
  }

  public function register()
  {
    $data = [
      'title' => 'Register',
      'page' => 'Register',
    ];
    $this->template('login', $data, 'user/register', $this->component);
  }
  public function forgot()
  {
    $data = [
      'title' => 'Forgot',
      'page' => 'Forgot',
    ];
    $this->template('login', $data, 'user/forgot', $this->component);
  }

  public function tes()
  {
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      try {
        if ($this->model('mahasiswa')->select()->where(['nim' => $username])->count() != 0) {
          $mahasiswa = $this->model('mahasiswa')->select('mahasiswa.password , mahasiswa.id_mahasiswa , mahasiswa.nama_mahasiswa')->where(['nim' => $username])->get();
          if ($mahasiswa[0]['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $mahasiswa[0]['id_mahasiswa'];
            $data = [
              'status' => 1
            ];
            $this->model('mahasiswa')->select()->where(['id_mahasiswa' => ($mahasiswa[0]['id_mahasiswa'])])->update($data);
            $this->redirectData('admin', ['success' => 'Login Success, Welcome ' . ($mahasiswa[0]['nama_mahasiswa'])]);
          } else {
            $this->redirectData('login', ['error' => 'Login Failed']);
          }
        } elseif ($this->model('dosen')->select()->where(['nid' => $username])->count() != 0) {
          $dosen = $this->model('dosen')->select('dosen.password , dosen.id_dosen, dosen.nama_dosen')->where(['nid' => $username])->get();
          if ($dosen[0]['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $dosen[0]['id_dosen'];
            $data = [
              'status' => 1
            ];
            $this->model('dosen')->select()->where(['id_dosen' => ($dosen[0]['id_dosen'])])->update($data);
            $this->redirectData('admin', ['success' => 'Login Success, Welcome ' . ($dosen[0]['nama_dosen'])]);
          } else {
            $this->redirectData('login', ['error' => 'Login Failed']);
          }
        } elseif ($this->model('admin')->select()->where(['username' => $username])->count() != 0) {
          $admin = $this->model('admin')->select('admin.password , admin.id_admin , admin.nama_admin')->where(['username' => $username])->get();
          if ($admin[0]['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $admin[0]['id_admin'];
            $data = [
              'status' => 1
            ];
            $this->model('admin')->select()->where(['id_admin' => ($admin[0]['id_admin'])])->update($data);
            $this->redirectData('admin', ['success' => 'Login Success, Welcome ' . ($admin[0]['nama_admin'])]);
          } else {
            $this->redirectData('login', ['error' => 'Login Failed']);
          }
        } else {
          $this->redirectData('login', ['error' => 'Login Failed']);
        }
      } catch (Exception $e) {
        $this->redirectData('login', ['error' => 'Login Failed']);
      }
    }
  }
}
