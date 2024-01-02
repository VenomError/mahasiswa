<?php

class Admin extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('admin');
    $this->setIdColumn('id_admin');
  }
}
