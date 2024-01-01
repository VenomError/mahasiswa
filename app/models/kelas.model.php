<?php

class Kelas extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('kelas');
    $this->setIdColumn('id_kelas');
  }
}
