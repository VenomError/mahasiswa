<?php

use library\MainController;

class MatakuliahController extends MainController
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
    $this->getPage('Matakuliah');
  }

  public function index()
  {
    try {
      $matakuliah = $this->model('matakuliah')->select()->get();
      $dosen = $this->model('dosen')->select()->get();
    } catch (Exception $e) {
      $this->redirectData('error', $e->getMessage());
    }
    $data = [
      "title" => "Matakuliah",
      "navMatakuliah" => "active",
      "page" => $this->page,
      'matakuliah' => $matakuliah,
      'dosen' => $dosen
    ];
    $this->template('admin', $data, 'matakuliah/index', $this->component);
  }


  public function edit($id)
  {
    try {
      $data = $this->model('matakuliah')->select()->where(['id_matakuliah' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('matakuliah', ['error' => $e->getMessage()]);
    }
    $session =
      [
        'display' => $id,
        'nama' => $data['nama_matakuliah'],
      ];
    $this->redirectData('matakuliah', $session);
  }

  public function update()
  {
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_matakuliah' => $nama,
        ];
      try {
        $this->model('matakuliah')->select()->where(['id_matakuliah' => $id])->update($data);
        $this->redirectData('matakuliah', ['success' => 'Edit matakuliah Success']);
      } catch (Exception $e) {
        $this->redirectData('matakuliah', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('matakuliah');
    }
  }
  public function remove($id)
  {
    try {
      $this->model('matakuliah')->select()->where(['id_matakuliah' => $id])->delete();
      $this->redirectData('matakuliah', ['success' => 'Berhasil Hapus matakuliah']);
    } catch (Exception $e) {
      $this->redirectData('matakuliah', ['error' => $e->getMessage()]);
    }
  }
  public function store()
  {
    if (isset($_POST['create'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_matakuliah' => $nama,
        ];
      // $mhs = [
      //   'matakuliah' => 'null'
      // ];
      try {
        // $this->model('mahasiswa')->select()->where(['matakuliah' => $id])->update($mhs);
        $this->model('matakuliah')->create($data);
        $this->redirectData('matakuliah', ['success' => 'Create matakuliah Success']);
      } catch (Exception $e) {
        $this->redirectData('matakuliah', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('matakuliah');
    }
  }
}
