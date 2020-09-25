<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {
  public function getAllForum(){
     $query = "SELECT `forum`.*, `user`.`name`
              FROM `forum` JOIN `user`
              ON `forum`.`id_pembuat` = `user`.`id`
              ORDER BY `forum`.`tanggal_dibuat` DESC";
      return $this->db->query($query)->result_array();
  }
}
