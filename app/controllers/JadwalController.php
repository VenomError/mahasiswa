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
      $jadwal = $this->model('jadwal')->select('jadwal.*, dosen.*, ruangan.* ,status.*')
        ->join('dosen', 'jadwal.dosen = dosen.id_dosen')
        ->join('ruangan', 'jadwal.ruangan = ruangan.id_ruangan')
        ->join('status', 'jadwal.status = status.id_status')
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
}
