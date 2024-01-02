<?php

class Hari extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('hari');
    $this->setIdColumn('id_hari');
  }
}
