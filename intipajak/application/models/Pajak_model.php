<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pajak_model extends CI_Model
{

    public function getAllObjekPajak($idobjekpajak = null)
    {
        // $this->db->query("SET sql_mode = '' ");
        // return $this->db->get('objekpajak')->result_array();
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('');
        if ($idobjekpajak === null) {
            return $this->db->get('objekpajak')->result_array();
        } else {
            return $this->db->get_where('objekpajak', ['idobjekpajak' => $idobjekpajak])->result_array();
        }
    }


    function tambahdataobjp($data)
    {
        $this->db->insert('objekpajak', $data);
        return $this->db->affected_rows();
    }

    public function hapusdataobjp($idobjekpajak)
    {
        $this->db->delete('objekpajak', ['idobjekpajak' => $idobjekpajak]);
        return $this->db->affected_rows();
    }

    public function getAllObjekPajakbyID($idobjekpajak)
    {
        $this->db->query("SET sql_mode = '' ");
        return $this->db->get_where('objekpajak', ['idobjekpajak' => $idobjekpajak])->row_array();
    }

    public function ubahobjp($data, $idobjekpajak)
    {
        $this->db->update('objekpajak', $data, ['idobjekpajak' => $idobjekpajak]);
        return $this->db->affected_rows();
    }
    public function cariDataObjekPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword = $this->input->post('keyword');
        $this->db->like('nomorplat', $keyword);
        return $this->db->get('objekpajak')->result_array();
    }
}

/* End of file mahasiswa_model.php */
/* Location: ./application/models/mahasiswa_model.php */
