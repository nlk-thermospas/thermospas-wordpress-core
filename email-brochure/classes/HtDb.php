<?php

class HtDb
{

  private $db;

  public function __construct()
  {
    $db_name = 'admin_thermospas_data';
    $db_host = 'localhost';
    $db_user = 'thermo_data';
    $db_pass = 'TH3RMO_data!';
    $this->db = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Error " . mysqli_error($this->db));
  }

  function get($table, $primary_key)
  {
    if (is_array($primary_key)) {
      $query = "SELECT * FROM $table WHERE {$primary_key[0]} = '{$primary_key[1]}'";
    } else {
      $query = "SELECT * FROM $table WHERE id = '$primary_key'";
    }

    $result = $this->db->query($query);

    $return = array();
    while($row = mysqli_fetch_array($result)) {
      foreach($row as $key => $value){
        if(! is_numeric($key)) {
          $return[$key] = $value;
        }
      }
    }

    return $return;
  }

}