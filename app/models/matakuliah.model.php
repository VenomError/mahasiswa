<?php

class Matakuliah extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('matakuliah');
    $this->setIdColumn('id_matakuliah');
  }
}
