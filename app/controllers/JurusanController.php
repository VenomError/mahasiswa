<?php

use library\MainController;

class JurusanController extends MainController
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
    $this->getPage('Jurusan');
  }

  public function index()
  {
    try {
      $jurusan = $this->model('jurusan')->select()->get();
      $mahasiswa = $this->model('mahasiswa')->select()->get();
    } catch (Exception $e) {
      $this->redirectData('error', $e->getMessage());
    }
    $data = [
      "title" => "Mahasiswa",
      "navJurusan" => "active",
      "page" => $this->page,
      'jurusan' => $jurusan,
      'mahasiswa' => $mahasiswa
    ];
    $this->template('admin', $data, 'jurusan/index', $this->component);
  }

  public function edit($id)
  {
    try {
      $data = $this->model('jurusan')->select()->where(['id_jurusan' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('jurusan', ['error' => $e->getMessage()]);
    }
    $session =
      [
        'display' => $id,
        'nama' => $data['nama_jurusan'],
      ];
    $this->redirectData('jurusan', $session);
  }

  public function update()
  {
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_jurusan' => $nama,
        ];
      try {
        $this->model('jurusan')->where(['id_jurusan' => $id])->update($data);
        $this->redirectData('jurusan', ['success' => 'Edit jurusan Success']);
      } catch (Exception $e) {
        $this->redirectData('jurusan', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('jurusan');
    }
  }
}
