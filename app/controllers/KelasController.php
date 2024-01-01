<?php

use library\MainController;

class KelasController extends MainController
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
    $this->getPage('Kelas');
  }
  public function index()
  {
    try {
      $kelas = $this->model('kelas')->select()->get();
      $mahasiswa = $this->model('mahasiswa')->select()->get();
      $jadwal = $this->model('jadwal')->select()->get();
    } catch (Exception $e) {
      $this->redirectData('error', $e->getMessage());
    }
    $data = [
      "title" => "Kelas",
      "navKelas" => "active",
      "page" => $this->page,
      'kelas' => $kelas,
      'mahasiswa' => $mahasiswa,
      'jadwal' => $jadwal
    ];
    $this->template('admin', $data, 'kelas/index', $this->component);
  }

  public function edit($id)
  {
    try {
      $data = $this->model('kelas')->select()->where(['id_kelas' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('kelas', ['error' => $e->getMessage()]);
    }
    $session =
      [
        'display' => $id,
        'nama' => $data['nama_kelas'],
      ];
    $this->redirectData('kelas', $session);
  }

  public function update()
  {
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_kelas' => $nama,
        ];
      try {
        $this->model('kelas')->select()->where(['id_kelas' => $id])->update($data);
        $this->redirectData('kelas', ['success' => 'Edit kelas Success']);
      } catch (Exception $e) {
        $this->redirectData('kelas', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('kelas');
    }
  }

  public function remove($id)
  {
    try {
      $this->model('kelas')->select()->where(['id_kelas' => $id])->delete();
      $this->redirectData('kelas', ['success' => 'Berhasil Hapus kelas']);
    } catch (Exception $e) {
      $this->redirectData('kelas', ['error' => $e->getMessage()]);
    }
  }

  public function store()
  {
    if (isset($_POST['create'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_kelas' => $nama,
        ];
      $mhs = [
        'kelas' => 'null'
      ];
      try {
        // $this->model('mahasiswa')->select()->where(['kelas' => $id])->update($mhs);
        $this->model('kelas')->create($data);
        $this->redirectData('kelas', ['success' => 'Create kelas Success']);
      } catch (Exception $e) {
        $this->redirectData('kelas', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('kelas');
    }
  }
}
