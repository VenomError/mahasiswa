

<?php

use library\MainController;

use function PHPSTORM_META\elementType;

class MahasiswaController extends MainController
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
    $this->getPage('Mahasiswa');
  }
  public function index()
  {
    try {
      $mahasiswa = $this->model('mahasiswa')->select('mahasiswa.*, jurusan.nama_jurusan, semester.nama_semester, kelas.nama_kelas')
        ->join('jurusan', 'mahasiswa.jurusan = jurusan.id_jurusan')
        ->join('semester', 'mahasiswa.semester = semester.id_semester')
        ->join('kelas', 'mahasiswa.kelas = kelas.id_kelas')
        ->get();
      $data = [
        'mahasiswa' => $mahasiswa,
        "title" => "Mahasiswa",
        "navMHS" => "active",
        "page" => $this->page,
      ];
      $this->template('admin', $data, 'mahasiswa/index', $this->component);
    } catch (Exception $e) {
      $this->redirectData('admin', ['error' => $e->getMessage()]);
    }
  }

  public function create()
  {
    try {
      $data = [
        "title" => "Create Mahasiswa",
        "navMHS" => "active",
        "page" => $this->page,
        "jurusan" => $this->model("mahasiswa")->select()->jurusan()->get(),
        "semester" => $this->model("mahasiswa")->select()->semester()->get(),
        "kelas" => $this->model("mahasiswa")->select()->kelas()->get(),
      ];
      $this->template('admin', $data, 'mahasiswa/create', $this->component);
    } catch (Exception $e) {
      $this->redirectData('mahasiswa', ['error' => $e->getMessage()]);
    }
  }

  public function store()
  {
    if (isset($_POST['create'])) {
      $avatars = $this->model('mahasiswa')->uploadAvatar($_FILES['avatars']);
      if ($avatars !== false) {
        $data = [
          'id_mahasiswa' => 'null',  // Gunakan null bukan 'NULL'
          'nama_mahasiswa' => $this->validate($_POST['nama']),
          'nim' => $_POST['nim'],
          'jurusan' => $_POST['jurusan'],
          'kelas' => $_POST['kelas'],
          'ttl' => $_POST['ttl'],
          'alamat' => $_POST['alamat'],
          'semester' => $_POST['semester'],
          'avatars' => $avatars,
          'password' => $_POST['password']
        ];
        try {
          $this->model('mahasiswa')->create($data);
          $session = [
            'success' => 'Success to Create Data'
          ];
          $this->redirectData('mahasiswa', $session);
        } catch (Exception $e) {
          $this->redirectData('mahasiswa/create', ['error' => $e->getMessage()]);
        }
      } else {
        $session = [
          'error' => 'Something errors to Create Data'
        ];
        $this->redirectData('mahasiswa/create', $session);
      }
    } else {

      $this->redirect('mahasiswa');
    }
  }
  public function remove($id)
  {
    try {
      $data = $this->model('mahasiswa')->select()->where(['id_mahasiswa' => $id])->find($id);
    } catch (Exception $e) {
      $this->redirectData('mahasiswa', ['error' => $e->getMessage()]);
    }
    if ($data) {
      $path = ROOT . DS . 'public' . DS . 'assets' . DS . 'avatars' . DS . $data['avatars'];

      // Hapus file gambar
      unlink($path);
    }
    try {
      if ($this->model('mahasiswa')->where(['id_mahasiswa' => $id])->delete()) {

        $session =
          [
            'success' => 'Remove Data Success'
          ];
        $this->redirectData('mahasiswa', $session);
      } else {
        $session =
          [
            'error' => 'Remove Data Success'
          ];
        $this->redirectData('mahasiswa', $session);
      }
    } catch (Exception $e) {
      $this->redirectData('mahasiswa', ['error' => $e->getMessage()]);
    }
  }
  public function edit($id)
  {
    try {
      $mahasiswa  = $this->model('mahasiswa')->select('mahasiswa.*, jurusan.*, semester.*, kelas.*',)
        ->join('jurusan', 'mahasiswa.jurusan = jurusan.id_jurusan')
        ->join('semester', 'mahasiswa.semester = semester.id_semester')
        ->join('kelas', 'mahasiswa.kelas = kelas.id_kelas')
        ->where(['id_mahasiswa' => $id])
        ->get();
    } catch (Exception $e) {


      // $this->template('admin', $data, 'mahasiswa', $this->component);
      $this->redirectData('mahasiswa', ['error' => $e->getMessage()]);
    }
    $data = [
      "title" => "Edit Mahasiswa",
      "navMHS" => "active",
      "page" => $this->page,
      "mahasiswa" => $mahasiswa,
      // "mahasiswa" => $this->model('mahasiswa')->select()->where(['id_mahasiswa' => $_POST['id']])->get(),
      "jurusan" => $this->model("mahasiswa")->select()->jurusan()->get(),
      "semester" => $this->model("mahasiswa")->select()->semester()->get(),
      "kelas" => $this->model("mahasiswa")->select()->kelas()->get(),
    ];
    $this->template('admin', $data, 'mahasiswa/edit', $this->component);
  }


  public function update()
  {
    if (isset($_POST['update'])) {
      if (!empty($_FILES['avatars']['name'])) {
        $avatars = $this->model('mahasiswa')->uploadAvatar($_FILES['avatars']);
        $path = ROOT . DS . 'public' . DS . 'assets' . DS . 'avatars' . DS . $_POST['avatarsOld'];
        // Hapus file gambar
        unlink($path);
      } else {
        $avatars = $_POST['avatarsOld'];
      }
      $data = [ // Gunakan null bukan 'NULL'
        'nama_mahasiswa' => $this->validate($_POST['nama']),
        'nim' => $_POST['nim'],
        'jurusan' => $_POST['jurusan'],
        'kelas' => $_POST['kelas'],
        'ttl' => $_POST['ttl'],
        'alamat' => $_POST['alamat'],
        'semester' => $_POST['semester'],
        'avatars' => $avatars,
        'password' => $_POST['password']
      ];
      try {
        $this->model('mahasiswa')->where(['id_mahasiswa' => $_POST['id']])->update($data);
        $session =
          [
            'success' => 'Success to Edit Mahasiswa'
          ];
        $this->redirectData('mahasiswa', $session);
      } catch (PDOException $e) {
        $session =
          [
            'error' => $e
          ];
        $this->redirectData('mahasiswa', $session);
      }
    } else {
      $this->redirect('mahasiswa');
    }
  }

  public function detail($id)
  {
    try {
      $mahasiswa = $this->model('mahasiswa')
        ->select('mahasiswa.*, jurusan.*, semester.*, kelas.*',)
        ->join('jurusan', 'mahasiswa.jurusan = jurusan.id_jurusan')
        ->join('semester', 'mahasiswa.semester = semester.id_semester')
        ->join('kelas', 'mahasiswa.kelas = kelas.id_kelas')
        ->where(['id_mahasiswa' => $id])
        ->get();
    } catch (Exception $e) {
      $this->redirectData('mahasiswa', ['error' => $e->getMessage()]);
    }
    $data = [
      'title' => 'Mahasiswa Detail',
      'navMHS' => 'active',
      'page' => $this->page,
      'mahasiswa' => $mahasiswa
    ];

    $this->template('admin', $data, 'mahasiswa/detail', $this->component);
  }
}
