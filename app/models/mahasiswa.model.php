<?php

class Mahasiswa extends Model
{
  public function  __construct()
  {

    parent::__construct();
    $this->table('mahasiswa');
    $this->setIdColumn('id_mahasiswa');
  }

  public function jurusan()
  {
    $this->table('jurusan');
    $this->setIdColumn('id_jurusan');
    return $this;
  }

  public function semester()
  {
    $this->table('semester');
    $this->setIdColumn('id_semester');
    return $this;
  }

  public function kelas()
  {
    $this->table('kelas');
    $this->setIdColumn('id_kelas');
    return $this;
  }
}
