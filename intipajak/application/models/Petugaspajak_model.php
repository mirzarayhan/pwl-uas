<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugaspajak_model extends CI_Model
{

    public function getPetugas()
    {
        $this->db->query("SET sql_mode = '' ");
        return $this->db->get('petugaspajak')->result_array();
    }
    function tambahdataptgp()
    {
        $this->db->query("SET sql_mode = '' ");
        $data = [
            "namapetugas" => $this->input->post('namapetugas', true),
            "alamat" => $this->input->post('alamat', true),
            "notelp" => $this->input->post('notelp', true)
        ];
        $this->db->insert('petugaspajak', $data);
    }

    public function hapusdataptgp($idpetugas)
    {
        $this->db->query("SET sql_mode = '' ");
        $this->db->where('idpetugas', $idpetugas);
        $this->db->delete('petugaspajak');
    }

    public function getAllPetugasPajakbyID($idpetugas)
    {
        $this->db->query("SET sql_mode = '' ");
        return $this->db->get_where('petugaspajak', ['idpetugas' => $idpetugas])->row_array();
    }
    public function ubahptgp()
    {
        $this->db->query("SET sql_mode = '' ");
        $data = [
            "namapetugas" => $this->input->post('namapetugas', true),
            "alamat" => $this->input->post('alamat', true),
            "notelp" => $this->input->post('notelp', true)
        ];
        $this->db->where('idpetugas', $this->input->post('idpetugas'));
        return $this->db->update('petugaspajak', $data);
    }

    public function cariDataPetugasPajak()
    {
        $this->db->query("SET sql_mode = '' ");
        $keyword = $this->input->post('keyword');
        $this->db->like('namapetugas', $keyword);
        return $this->db->get('petugaspajak')->result_array();
    }
}
?>