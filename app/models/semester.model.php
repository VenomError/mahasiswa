<?php

class Semester extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('semester');
    $this->setIdColumn('id_semester');
  }
}
