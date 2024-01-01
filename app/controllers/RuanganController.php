<?php

use library\MainController;

class RuanganController extends MainController
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
    $this->getPage('Ruangan');
  }

  public function index()
  {
    try {
      $ruangan = $this->model('ruangan')->select()->get();
      $dosen = $this->model('dosen')->select()->get();
    } catch (Exception $e) {
      $this->redirectData('error', $e->getMessage());
    }
    $data = [
      "title" => "Ruangan",
      "navRuangan" => "active",
      "page" => $this->page,
      'ruangan' => $ruangan,
      'dosen' => $dosen
    ];
    $this->template('admin', $data, 'ruangan/index', $this->component);
  }


  public function edit($id)
  {
    try {
      $data = $this->model('ruangan')->select()->where(['id_ruangan' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('ruangan', ['error' => $e->getMessage()]);
    }
    $session =
      [
        'display' => $id,
        'nama' => $data['nama_ruangan'],
      ];
    $this->redirectData('ruangan', $session);
  }

  public function update()
  {
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_ruangan' => $nama,
        ];
      try {
        $this->model('ruangan')->select()->where(['id_ruangan' => $id])->update($data);
        $this->redirectData('ruangan', ['success' => 'Edit ruangan Success']);
      } catch (Exception $e) {
        $this->redirectData('ruangan', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('ruangan');
    }
  }
  public function remove($id)
  {
    try {
      $this->model('ruangan')->select()->where(['id_ruangan' => $id])->delete();
      $this->redirectData('ruangan', ['success' => 'Berhasil Hapus ruangan']);
    } catch (Exception $e) {
      $this->redirectData('ruangan', ['error' => $e->getMessage()]);
    }
  }
  public function store()
  {
    if (isset($_POST['create'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_ruangan' => $nama,
        ];
      // $mhs = [
      //   'ruangan' => 'null'
      // ];
      try {
        // $this->model('mahasiswa')->select()->where(['ruangan' => $id])->update($mhs);
        $this->model('ruangan')->create($data);
        $this->redirectData('ruangan', ['success' => 'Create ruangan Success']);
      } catch (Exception $e) {
        $this->redirectData('ruangan', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('ruangan');
    }
  }
}
