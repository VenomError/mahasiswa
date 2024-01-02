<?php

class Status extends Model
{
  public function __construct()
  {
    parent::__construct();
    $this->table('status');
    $this->setIdColumn('id_status');
  }
}
