<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {
  public function getAkun(){
     $query = "SELECT `user`.*, `user_role`.`role`
              FROM `user` JOIN `user_role`
              ON `user`.`role_id` = `user_role`.`id`
              WHERE `user`.`id` != 27";
      return $this->db->query($query)->result_array();
  }
}
