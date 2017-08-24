<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model{
    
    function GetDataBarang($where = null){
        $query = "SELECT * FROM barang ";
        $query = $where != null ?  $query."WHERE kode_barang = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataKategori($where = null){
        $query = "SELECT * FROM kategori ";
        $where != null ? $query = $query."WHERE kode_kategoribarang = $where" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataPemasok($where = null){
        $query = "SELECT * FROM pemasok ";
        $where != null ? $query = $query."WHERE kode_pemasok = $where" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataUser($where = null){
        $query = "SELECT * FROM user ";
        $where != null ? $query = $query."WHERE iduser = $where" : $query;
        return $this->db->query($query)->result();
    }

    function InsertDataBarang(){
        $data = array(
            'kode_barang' => ucwords($this->input->post('kode_barang')),
            'nama_barang' => ucwords($this->input->post('nama_barang')),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'satuan' => $this->input->post('satuan'),
            'stok' => $this->input->post('stok'),
            'kode_kategoribarang' => $this->input->post('kategori'),
            'kode_pemasok' => $this->input->post('pemasok'),
            );
        $this->db->insert('barang', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataBarang($id){      
        $data = array(
            'kode_barang' => ucwords($this->input->post('kode_barang')),
            'nama_barang' => ucwords($this->input->post('nama_barang')),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'satuan' => $this->input->post('satuan'),
            'stok' => $this->input->post('stok'),
            'kode_kategoribarang' => $this->input->post('kategori'),
            'kode_pemasok' => $this->input->post('pemasok'),
        );
        $this->db->where('kode_barang', $id);
        $this->db->update('barang', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function DeleteDataBarang($id){
        $this->db->where('kode_barang', $id);
        $this->db->delete('barang');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file master_model.php */
