<?php

class Jadwal extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('jadwal');
    $this->setIdColumn('id_jadwal');
  }
}
