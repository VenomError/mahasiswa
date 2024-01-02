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
    try {
      $dosen = $this->model('dosen')->select('dosen.* , matakuliah.*')
        ->join('matakuliah', 'dosen.matakuliah = matakuliah.id_matakuliah')
        ->get();
    } catch (Exception $e) {
      $this->redirectData('dosen', ['error' => $e->getMessage()]);
    }
    $data =
      [
        "title" => "Dosen",
        "navDosen" => "active",
        "page" => $this->page,
        "dosen" => $dosen,
      ];
    $this->template('admin', $data, 'dosen/index', $this->component);
  }

  public function create()
  {
    try {
      $data = [
        "title" => "Create Dosen",
        "navDosen" => "active",
        "page" => $this->page,
        "dosen" => $this->model("dosen")->select()->get(),
        "matakuliah" => $this->model("matakuliah")->select()->get(),
        "jadwal" => $this->model("jadwal")
          ->select('jadwal.* , ruangan.* , hari.*')
          ->join('ruangan', 'jadwal.ruangan = ruangan.id_ruangan')
          ->join('hari', 'jadwal.hari = hari.id_hari')
          ->get(),
        "ruangan" => $this->model('ruangan')->select()->get(),
        "hari" => $this->model('hari')->select()->get(),
      ];
      $this->template('admin', $data, 'dosen/create', $this->component);
    } catch (Exception $e) {
      $this->redirectData('dosen', ['error' => $e->getMessage()]);
    }
  }

  public function store()
  {
    if (isset($_POST['create'])) {
      $avatars = $this->model('dosen')->uploadAvatar($_FILES['avatars']);
      if ($avatars !== false) {
        $data = [
          'id_dosen' => 'null',  // Gunakan null bukan 'NULL'
          'nama_dosen' => $this->validate($_POST['nama']),
          'nid' => $_POST['nid'],
          'ttl' => $_POST['ttl'],
          'alamat' => $_POST['alamat'],
          'matakuliah' => $_POST['matakuliah'],
          'avatars' => $avatars,
          'password' => $_POST['password']
        ];
        try {
          $this->model('dosen')->create($data);
          $session = [
            'success' => 'Success to Create Data'
          ];
          $this->redirectData('dosen', $session);
        } catch (Exception $e) {
          $this->redirectData('dosen/create', ['error' => $e->getMessage()]);
        }
      } else {
        $session = [
          'error' => 'Something errors to Create Data'
        ];
        $this->redirectData('dosen/create', $session);
      }
    } else {

      $this->redirect('dosen');
    }
  }
  public function remove($id)
  {
    try {
      $data = $this->model('dosen')->select()->where(['id_dosen' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('dosen', ['error' => $e->getMessage()]);
    }
    if ($data) {
      $path = ROOT . DS . 'public' . DS . 'assets' . DS . 'avatars' . DS . $data['avatars'];

      // Hapus file gambar
      unlink($path);
    }
    try {
      if ($this->model('dosen')->where(['id_dosen' => $id])->delete()) {

        $session =
          [
            'success' => 'Remove Data Success'
          ];
        $this->redirectData('dosen', $session);
      } else {
        $session =
          [
            'error' => 'Remove Data Success'
          ];
        $this->redirectData('dosen', $session);
      }
    } catch (Exception $e) {
      $this->redirectData('dosen', ['error' => $e->getMessage()]);
    }
  }
  public function edit($id)
  {
    try {
      $dosen  = $this->model('dosen')->select('dosen.*, matakuliah.*')
        ->join('matakuliah', 'dosen.matakuliah = matakuliah.id_matakuliah')
        ->where(['id_dosen' => $id])
        ->get();
      $matakuliah = $this->model('matakuliah')->select()->get();
    } catch (Exception $e) {


      // $this->template('admin', $data, 'dosen', $this->component);
      $this->redirectData('dosen', ['error' => $e->getMessage()]);
    }
    $data = [
      "title" => "Edit Dosen",
      "navDosen" => "active",
      "page" => $this->page,
      "dosen" => $dosen,
      "matakuliah" => $matakuliah,
    ];
    $this->template('admin', $data, 'dosen/edit', $this->component);
  }

  public function update()
  {
    if (isset($_POST['update'])) {
      if (!empty($_FILES['avatars']['name'])) {
        $avatars = $this->model('dosen')->uploadAvatar($_FILES['avatars']);
        $path = ROOT . DS . 'public' . DS . 'assets' . DS . 'avatars' . DS . $_POST['avatarsOld'];
        // Hapus file gambar
        unlink($path);
      } else {
        $avatars = $_POST['avatarsOld'];
      }
      $data = [ // Gunakan null bukan 'NULL'// Gunakan null bukan 'NULL'
        'nama_dosen' => $this->validate($_POST['nama']),
        'nid' => $_POST['nid'],
        'ttl' => $_POST['ttl'],
        'alamat' => $_POST['alamat'],
        'matakuliah' => $_POST['matakuliah'],
        'avatars' => $avatars,
        'password' => $_POST['password']
      ];
      try {
        $this->model('dosen')->where(['id_dosen' => $_POST['id']])->update($data);
        $session =
          [
            'success' => 'Success to Edit dosen'
          ];
        $this->redirectData('dosen', $session);
      } catch (Exception $e) {
        $session =
          [
            'error' => $e
          ];
        $this->redirectData('dosen', $session);
      }
    } else {
      $this->redirect('dosen');
    }
  }
}
