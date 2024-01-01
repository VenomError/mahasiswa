<?php

use library\MainController;

class SemesterController extends MainController
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
    $this->getPage('Semester');
  }

  public function index()
  {
    try {
      $semester = $this->model('semester')->select()->get();
      $mahasiswa = $this->model('mahasiswa')->select()->get();
    } catch (Exception $e) {
      $this->redirectData('error', $e->getMessage());
    }
    $data = [
      "title" => "Mahasiswa",
      "navSemester" => "active",
      "page" => $this->page,
      'semester' => $semester,
      'mahasiswa' => $mahasiswa
    ];
    $this->template('admin', $data, 'semester/index', $this->component);
  }

  public function edit($id)
  {
    try {
      $data = $this->model('semester')->select()->where(['id_semester' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('semester', ['error' => $e->getMessage()]);
    }
    $session =
      [
        'display' => $id,
        'nama' => $data['nama_semester'],
      ];
    $this->redirectData('semester', $session);
  }
  public function update()
  {
    if (isset($_POST['edit'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_semester' => $nama,
        ];
      try {
        $this->model('semester')->select()->where(['id_semester' => $id])->update($data);
        $this->redirectData('semester', ['success' => 'Edit semester Success']);
      } catch (Exception $e) {
        $this->redirectData('semester', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('semester');
    }
  }
  public function remove($id)
  {
    try {
      $this->model('semester')->select()->where(['id_semester' => $id])->delete();
      $this->redirectData('semester', ['success' => 'Berhasil Hapus semester']);
    } catch (Exception $e) {
      $this->redirectData('semester', ['error' => $e->getMessage()]);
    }
  }
  public function store()
  {
    if (isset($_POST['create'])) {
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $data =
        [
          'nama_semester' => $nama,
        ];
      $mhs = [
        'semester' => 'null'
      ];
      try {
        // $this->model('mahasiswa')->select()->where(['semester' => $id])->update($mhs);
        $this->model('semester')->create($data);
        $this->redirectData('semester', ['success' => 'Create semester Success']);
      } catch (Exception $e) {
        $this->redirectData('semester', ['error' => $e->getMessage()]);
      }
    } else {
      $this->redirect('semester');
    }
  }
}
