<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
  public function getLaporanKSTM(){
     $query = "SELECT `laporan_kstm`.*, `user`.`name`
              FROM `laporan_kstm` JOIN `user`
              ON `laporan_kstm`.`id_pelapor` = `user`.`id`";
      return $this->db->query($query)->result_array();
  }
  public function getExportLaporanKSTM(){
     $query = "SELECT `laporan_kstm`.*, `user`.`name`
              FROM `laporan_kstm` JOIN `user`
              ON `laporan_kstm`.`id_pelapor` = `user`.`id`";
      return $this->db->query($query)->result_array();
  }
  public function getLaporanKSTMById($id){
     $query = "SELECT `laporan_kstm`.*, `user`.`name`
              FROM `laporan_kstm` JOIN `user`
              ON `laporan_kstm`.`id_pelapor` = `user`.`id`
              WHERE `laporan_kstm`.`id_laporan_kstm` = $id";
      return $this->db->query($query)->row_array();
  }
  public function getLaporanPengontrol(){
     $query = "SELECT `laporan_pengontrol`.*, `user`.`name`
              FROM `laporan_pengontrol` JOIN `user`
              ON `laporan_pengontrol`.`id_pelapor` = `user`.`id`";
      return $this->db->query($query)->result_array();
  }
}
