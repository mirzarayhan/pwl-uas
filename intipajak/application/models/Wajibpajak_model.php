<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wajibpajak_model extends CI_Model
{

    public function getAllWajibPajak($idnpwp = null)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->select('');
        if ($idnpwp === null) {
            return $this->db->get('wajibpajak')->result_array();
        } else {
            return $this->db->get_where('wajibpajak', ['idnpwp' => $idnpwp])->result_array();
        }
    }


    function tambahdatawjbp($data)
    {
        $this->db->query("SET sql_mode = '' ");
        $data = [
            "nama" => $this->input->post('nama', true),
            "namalengkap" => $this->input->post('namalengkap', true),
            "alamat" => $this->input->post('alamat', true),
            "idobjekpajakfk" => $this->input->post('idobjekpajakfk', true),
            "notelp" => $this->input->post('notelp', true)
        ];

        $this->db->insert('wajibpajak', $data);
        return $this->db->affected_rows();
    }

    public function hapusdatawjbp($idnpwp)
    {
        $this->db->delete('wajibpajak', ['idnpwp' => $idnpwp]);
        return $this->db->affected_rows();
    }
    public function getAllWajibPajakbyID($idnpwp)
    {
        $this->db->query("SET sql_mode = '' ");
        return $this->db->get_where('wajibpajak', ['idnpwp' => $idnpwp])->row_array();
    }
    public function ubahwjbp($data, $idnpwp)
    {
        $this->db->update('wajibpajak', $data, ['idnpwp' => $idnpwp]);
        return $this->db->affected_rows();
    }

    public function cariDataWajibPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        return $this->db->get('wajibpajak')->result_array();
    }
}

/* End of file mahasiswa_model.php */
/* Location: ./application/models/mahasiswa_model.php */
