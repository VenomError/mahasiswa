<?php

class Dosen extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('dosen');
    $this->setIdColumn('id_dosen');
  }
}
