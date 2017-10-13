<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model{
    
    function GetDataBarang($where = null){
        $query = "SELECT * FROM barang ";
        $query = $where != null ?  $query."WHERE kode_barang = '$where'" : $query;
        return $this->db->query($query)->result();
    }

    function GetJoinDataBarang(){
        $query = "	
        SELECT 
        a.`kode_barang`, a.`nama_barang`, a.`harga_beli`, a.`harga_jual`, a.`warna_barang`, a.`stok`,
        p.`kode_pemasok`, k.`kode_kategoribarang`, s.`kode_satuan` 
        FROM barang AS a
        LEFT JOIN kategori AS k ON a.`kode_kategoribarang` = k.`kode_kategoribarang`
        LEFT JOIN pemasok AS p ON a.`kode_pemasok` = p.`kode_pemasok`
        LEFT JOIN satuan AS s ON a.`kode_satuan` = s.`kode_satuan`
        ";
        return $this->db->query($query)->result();
    }
    function GetDataKategori($where = null){
        $query = "SELECT * FROM kategori ";
        $where != null ? $query = $query."WHERE kode_kategoribarang = '$where'" : $query;
        return $this->db->query($query)->result();
    }
    function GetDataSatuan($where = null){
        $query = "SELECT * FROM satuan ";
        $where != null ? $query = $query."WHERE kode_satuan = '$where'" : $query;
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
    function GetDataUserAkses($where = null){
        $query = "SELECT user.`id_user`, user.`username`, user.`password`, user.`foto`, user.`id_akses`, akses.`level_akses` 
        FROM user LEFT JOIN akses ON user.`id_akses` = akses.`id_akses`  ";
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

    function InsertDataPelanggan($namafile){
        $data = array(
            'nama_pelanggan' => ucwords($this->input->post('nama_pelanggan')),
            'alamat_pelanggan' => ucwords($this->input->post('alamat_pelanggan')),
            'kota_pelanggan' => ucwords($this->input->post('kota_pelanggan')),
            'provinsi_pelanggan' => ucwords($this->input->post('provinsi_pelanggan')),
            'tgl_terdaftar_pelanggan' => $this->input->post('tgl_terdaftar_pelanggan'),
            'no_tlp1_pelanggan' => $this->input->post('no_tlp1_pelanggan'),
            'no_tlp2_pelanggan' => $this->input->post('no_tlp2_pelanggan'),
            'nama_toko_pelanggan' => $this->input->post('nama_toko_pelanggan'),
            'foto_pelanggan' => $namafile,
            'keterangan' => ucwords($this->input->post('keterangan_pelanggan'))
            );
        $this->db->insert('pelanggan', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    function UpdateDataPelanggan($id, $namafile_baru){      
        $data = array(
            'nama_pelanggan' => ucwords($this->input->post('nama_pelanggan')),
            'alamat_pelanggan' => ucwords($this->input->post('alamat_pelanggan')),
            'kota_pelanggan' => ucwords($this->input->post('kota_pelanggan')),
            'provinsi_pelanggan' => ucwords($this->input->post('provinsi_pelanggan')),
            'tgl_terdaftar_pelanggan' => $this->input->post('tgl_terdaftar_pelanggan'),
            'no_tlp1_pelanggan' => $this->input->post('no_tlp1_pelanggan'),
            'no_tlp2_pelanggan' => $this->input->post('no_tlp2_pelanggan'),
            'nama_toko_pelanggan' => $this->input->post('nama_toko_pelanggan'),
            'foto_pelanggan' => $namafile_baru,
            'keterangan_pelanggan' => ucwords($this->input->post('keterangan_pelanggan'))
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

    function InsertDataUser($nama_foto){
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),           
            'id_akses' => $this->input->post('id_akses'),    
            'foto' => $nama_foto
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
