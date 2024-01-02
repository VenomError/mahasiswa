<?php

use library\MainController;

class JadwalController extends MainController
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
    $this->getPage('Jadwal');
  }


  public function index()
  {
    try {
      $jadwal = $this->model('jadwal')->select('jadwal.*, dosen.*, ruangan.* ,status.* , hari.*')
        ->join('dosen', 'jadwal.dosen = dosen.id_dosen')
        ->join('ruangan', 'jadwal.ruangan = ruangan.id_ruangan')
        ->join('status', 'jadwal.status = status.id_status')
        ->join('hari', 'jadwal.hari = hari.id_hari')
        ->get();
    } catch (Exception $e) {
      $this->redirectData('admin', ['error' => $e->getMessage()]);
    }
    $data = [
      "title" => "Jadwal",
      "navJadwal" => "active",
      "page" => $this->page,
      'jadwal' => $jadwal,
    ];
    $this->template('admin', $data, 'jadwal/index', $this->component);
  }
  public function create()
  {
    try {
      $jadwal =  $this->model('jadwal')->select()->get();
      $ruangan = $this->model('ruangan')->select()->get();
      $hari = $this->model('hari')->select()->get();
      $dosen = $this->model('dosen')
        ->select('dosen.*, matakuliah.*')
        ->join('matakuliah', 'dosen.matakuliah = matakuliah.id_matakuliah')
        ->get();
    } catch (Exception $e) {
      $this->redirectData('admin', ['error' => $e->getMessage()]);
    }
    $data = [
      'title' => 'Create Jadwal',
      'navJadwal' => 'active',
      'page' => $this->page,
      'jadwal' => $jadwal,
      'ruangan' => $ruangan,
      'dosen' => $dosen,
      'hari' => $hari,
    ];
    $this->template('admin', $data, 'jadwal/create', $this->component);
  }
  public function store()
  {
    if (isset($_POST['create'])) {
      $mulai = $_POST['mulai'];
      $selesai = $_POST['selesai'];
      $mulaiTime = strtotime($mulai);
      $selesaiTime = strtotime($selesai);
      $nowTime = time();
      $inputHari = strtolower($_POST['hari']);

      // Mendapatkan nama hari saat ini dalam bahasa Inggris
      $today = date('N');


      if ($today === $inputHari) {
        if ($nowTime >= $mulaiTime && $nowTime <= $selesaiTime) {
          $status = '1';
        } elseif ($mulaiTime > $nowTime) {
          $status = '4';
        } elseif ($selesaiTime < $nowTime) {
          $status = '2';
        } else {
          $status = '3';
        }
      } else {
        $status = '4';
      }


      $dataStore =
        [
          'hari' => $_POST['hari'],
          'dosen' => $_POST['dosen'],
          'ruangan' => $_POST['ruangan'],
          'mulai' => $_POST['mulai'],
          'selesai' => $_POST['selesai'],
          'status' => $status
        ];
      try {
        $this->model('jadwal')->create($dataStore);
        $this->redirectData('jadwal', ['success' => 'Create jadwal Success']);
      } catch (Exception $e) {
        $this->redirectData('admin', ['error' => $e->getMessage()]);
      }
    }
  }

  public function edit($id)
  {
    try {
      $jadwal =  $this->model('jadwal')->select()->where(['id_jadwal' => $id])->get();
      $status =  $this->model('status')->select()->get();
      $ruangan = $this->model('ruangan')->select()->get();
      $hari = $this->model('hari')->select()->get();
      $dosen = $this->model('dosen')
        ->select('dosen.*, matakuliah.*')
        ->join('matakuliah', 'dosen.matakuliah = matakuliah.id_matakuliah')
        ->get();
    } catch (Exception $e) {
      $this->redirectData('admin', ['error' => $e->getMessage()]);
    }
    $data = [
      'title' => 'Create Jadwal',
      'navJadwal' => 'active',
      'page' => $this->page,
      'jadwal' => $jadwal,
      'ruangan' => $ruangan,
      'dosen' => $dosen,
      'hari' => $hari,
      'status' => $status,
    ];
    $this->template('admin', $data, 'jadwal/edit', $this->component);
  }

  public function update()
  {
    if (isset($_POST['edit'])) {
      $dataStore =
        [
          'hari' => $_POST['hari'],
          'dosen' => $_POST['dosen'],
          'ruangan' => $_POST['ruangan'],
          'mulai' => $_POST['mulai'],
          'selesai' => $_POST['selesai'],
          'status' => $_POST['status'],
        ];
      try {
        $this->model('jadwal')->where(['id_jadwal' => $_POST['id']])->update($dataStore);
        $this->redirectData('jadwal', ['success' => 'Edit jadwal Success']);
      } catch (Exception $e) {
        $this->redirectData('admin', ['error' => $e->getMessage()]);
      }
    }
  }

  public function remove($id)
  {
    try {
      $this->model('jadwal')->where(['id_jadwal' => $id])->delete();
      $this->redirectData('jadwal', ['success' => 'Remove Success']);
    } catch (Exception $e) {
      $this->redirectData('jadwal', ['error' => $e->getMessage()]);
    }
  }
}
