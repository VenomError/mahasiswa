<?php

class Jurusan extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('jurusan');
    $this->setIdColumn('id_jurusan');
  }
}
