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
        $where != null ? $query = $query."WHERE kode_kategoribarang = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataPemasok($where = null){
        $query = "SELECT * FROM pemasok ";
        $where != null ? $query = $query."WHERE kode_pemasok = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataPelanggan($where = null){
        $query = "SELECT * FROM pelanggan ";
        $where != null ? $query = $query."WHERE kode_pelanggan = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataUser($where = null){
        $query = "SELECT * FROM user ";
        $where != null ? $query = $query."WHERE id_user = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataAkses($where = null){
        $query = "SELECT * FROM akses ";
        $where != null ? $query = $query."WHERE id_akses = '$where'" : $query;
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

    function DeleteDataBarang(){
        $id = $this->input->get('id');
        $this->db->where('kode_barang', $id);
        $this->db->delete('barang');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function InsertDataKategori(){
        $data = array(
            'kode_kategoribarang' => ucwords($this->input->post('kode_kategoribarang')),
            'nama_kategori' => ucwords($this->input->post('nama_kategori')),
            'keterangan' => $this->input->post('keterangan')
            );
        $this->db->insert('kategori', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataKategori($id){      
        $data = array(
            'kode_kategoribarang' => ucwords($this->input->post('kode_kategoribarang')),
            'nama_kategori' => ucwords($this->input->post('nama_kategori')),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('kode_kategoribarang', $id);
        $this->db->update('kategori', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function DeleteDataKategori(){
        $id = $this->input->get('id');
        $this->db->where('kode_kategoribarang', $id);
        $this->db->delete('kategori');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function InsertDataPemasok(){
        $data = array(
            'kode_pemasok' => ucwords($this->input->post('kode_pemasok')),
            'nama_pemasok' => ucwords($this->input->post('nama_pemasok')),
            'alamat' => ucwords($this->input->post('alamat')),
            'kota' => ucwords($this->input->post('kota')),
            'provinsi' => ucwords($this->input->post('provinsi')),
            'no_tlp1' => $this->input->post('no_tlp1'),
            'no_tlp2' => $this->input->post('no_tlp2'),
            'keterangan' => ucwords($this->input->post('keterangan'))
            );
        $this->db->insert('pemasok', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataPemasok($id){      
        $data = array(
            'kode_pemasok' => ucwords($this->input->post('kode_pemasok')),
            'nama_pemasok' => ucwords($this->input->post('nama_pemasok')),
            'alamat' => ucwords($this->input->post('alamat')),
            'kota' => ucwords($this->input->post('kota')),
            'provinsi' => ucwords($this->input->post('provinsi')),
            'no_tlp1' => $this->input->post('no_tlp1'),
            'no_tlp2' => $this->input->post('no_tlp2'),
            'keterangan' => ucwords($this->input->post('keterangan'))
        );
        $this->db->where('kode_pemasok', $id);
        $this->db->update('pemasok', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function DeleteDataPemasok(){
        $id = $this->input->get('id');
        $this->db->where('kode_pemasok', $id);
        $this->db->delete('pemasok');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function InsertDataPelanggan(){
        $data = array(
            'kode_pelanggan' => ucwords($this->input->post('kode_pelanggan')),
            'nama_pelanggan' => ucwords($this->input->post('nama_pelanggan')),
            'alamat' => ucwords($this->input->post('alamat')),
            'kota' => ucwords($this->input->post('kota')),
            'provinsi' => ucwords($this->input->post('provinsi')),
            'tgl_terdaftar' => $this->input->post('tgl_terdaftar'),
            'no_tlp1' => $this->input->post('no_tlp1'),
            'no_tlp2' => $this->input->post('no_tlp2'),
            'nama_toko_pelanggan' => $this->input->post('nama_toko_pelanggan'),
            'foto_pelanggan' => $this->input->post('nama_foto_pelanggan'),
            'keterangan' => ucwords($this->input->post('keterangan'))
            );
        $this->db->insert('pelanggan', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataPelanggan($id){      
        $data = array(
            'kode_pelanggan' => ucwords($this->input->post('kode_pelanggan')),
            'nama_pelanggan' => ucwords($this->input->post('nama_pelanggan')),
            'alamat' => ucwords($this->input->post('alamat')),
            'kota' => ucwords($this->input->post('kota')),
            'provinsi' => ucwords($this->input->post('provinsi')),
            'tgl_terdaftar' => $this->input->post('tgl_terdaftar'),
            'no_tlp1' => $this->input->post('no_tlp1'),
            'no_tlp2' => $this->input->post('no_tlp2'),
            'nama_toko_pelanggan' => $this->input->post('nama_toko_pelanggan'),
            'foto_pelanggan' => $this->input->post('nama_foto_pelanggan'),
            'keterangan' => ucwords($this->input->post('keterangan'))
        );
        $this->db->where('kode_pelanggan', $id);
        $this->db->update('pelanggan', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function DeleteDataPelanggan(){
        $id = $this->input->get('id');
        $this->db->where('kode_pelanggan', $id);
        $this->db->delete('pelanggan');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function InsertDataUser(){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),           
            'id_akses' => $this->input->post('id_akses'),    
        );
        $this->db->insert('user', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataUser($id){      
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),           
            'id_akses' => $this->input->post('id_akses')
        );
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function DeleteDataUser(){
        $id = $this->input->get('id');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}

/* End of file master_model.php */
