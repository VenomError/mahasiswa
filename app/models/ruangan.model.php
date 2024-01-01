<?php

class Ruangan extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('ruangan');
    $this->setIdColumn('id_ruangan');
  }
}
