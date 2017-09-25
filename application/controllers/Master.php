<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Master_model','model');
    }

    function Index(){
        $data['barang_view'] = $this->load->view('Master/barang_view', NULL, TRUE);
        $data['kategori_view'] = $this->load->view('Master/kategori_view', NULL, TRUE);
        $data['pemasok_view'] = $this->load->view('Master/pemasok_view', NULL, TRUE);
        $data['pelanggan_view'] = $this->load->view('Master/pelanggan_view', NULL, TRUE);
        $data['pengguna_view'] = $this->load->view('Master/pengguna_view', NULL, TRUE);
        $data['menu_active'] = 'master';
        $this->template->set('title', 'Kategori');
        $this->template->load('main_layout','contents', 'Master/master_view', $data);
    }
    function ShowDataBarang(){
        $result = $this->model->GetDataBarang();
        echo json_encode($result);
    }
    function ShowDataKategori(){
        $result = $this->model->GetDataKategori();
        echo json_encode($result);
    }
    function ShowDataPemasok(){
        $result = $this->model->GetDataPemasok();
        echo json_encode($result);
    }
    function ShowDataPelanggan(){
        $result = $this->model->GetDataPelanggan();
        echo json_encode($result);
    }
    function ShowDataUser(){
        $result = $this->model->GetDataUser();
        echo json_encode($result);
    }
    function ShowDataAkses(){
        $result = $this->model->GetDataAkses();
        echo json_encode($result);
    }

    function DoInsertBarang(){
        $isIdExist = $this->model->GetDataBarang($this->input->post('kode_barang'));
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'trim|required|min_length[6]|max_length[6]');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('harga_beli', 'harga_beli', 'required');
        $this->form_validation->set_rules('harga_jual', 'harga_jual', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        $this->form_validation->set_rules('kode_kategoribarang', 'satuan', 'required');
        $this->form_validation->set_rules('kode_pemasok', 'kode_pemasok', 'required');
        $msg['success'] = false;
        if($this->form_validation->run() == "FALSE"){
            $msg['success'] = false;
            $this->session->set_flashdata('error', 'Gagal Menambah Data Barang, Cek Kembali !');            
        }else{
            if(count($isIdExist) > 0){
                $msg['success'] = false;
               $this->session->set_flashdata('error', 'Kode Barang Sudah Ada, Silahkan Cek Tabel Barang Terlebih Dahulu !');            
            }else{
               $result =  $this->model->InsertDataBarang();              
               if($result){
                     $this->session->set_flashdata('success', 'Data Barang Berhasil Ditambah!');
                     $msg['success'] = true;
                }else{
                    $this->session->set_flashdata('error', 'Gagal Menambah Data Barang, Kesalahan Pada Query Database !');   
                    $msg['success'] = false;
                }     
            }    
        }
        echo json_encode($msg);
    }
    function DoUpdateBarang($id){
        $result = $this->model->UpdateDataBarang($id);
        $msg['success'] =  false;
        if($result) $msg['success'] = true;
        else $msg['seuccess']  = false;
        echo json_encode($msg);
    }

    function DoDeleteBarang(){
        $result = $this->model->DeleteDataBarang();
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }

    function DoInsertKategori(){
        $isIdExist = $this->model->GetDataKategori($this->input->post('kode_kategoribarang'));
        $msg['success'] = false;
            if(count($isIdExist) > 0){
               $msg['success'] = false;
               $this->session->set_flashdata('error', 'Data Kategori Sudah Ada, Silahkan Cek Tabel Kategori Terlebih Dahulu !');            
            }else{
               $result =  $this->model->InsertDataKategori();              
               if($result){
                     $this->session->set_flashdata('success', 'Data Kategori Berhasil Ditambah!');
                     $msg['success'] = true;
                }else{
                    $this->session->set_flashdata('error', 'Gagal Menambah Data Pemasok, Kesalahan Pada Query Database !');   
                    $msg['success'] = false;
                }     
            }    
        echo json_encode($msg);
    }

    function DoUpdateKategori($id){
        $result = $this->model->UpdateDataKategori($id);
        $msg['success'] =  false;
        if($result) $msg['success'] = true;
        else $msg['seuccess']  = false;
        echo json_encode($msg);
    }

    function DoDeleteKategori(){
        $result = $this->model->DeleteDataKategori();
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }

    function DoInsertPemasok(){
        $isIdExist = $this->model->GetDataPemasok($this->input->post('kode_pemasok'));
        $msg['success'] = false;
            if(count($isIdExist) > 0){
               $msg['success'] = false;
               $this->session->set_flashdata('error', 'Data Pemasok Sudah Ada, Silahkan Cek Tabel Pemasok Terlebih Dahulu !');            
            }else{
               $result =  $this->model->InsertDataPemasok();              
               if($result){
                     $this->session->set_flashdata('success', 'Data Pemasok Berhasil Ditambah!');
                     $msg['success'] = true;
                }else{
                    $this->session->set_flashdata('error', 'Gagal Menambah Data Pemasok, Kesalahan Pada Query Database !');   
                    $msg['success'] = false;
                }     
            }    
        echo json_encode($msg);
    }
    
    function DoUpdatePemasok($id){
        $result = $this->model->UpdateDataPemasok($id);
        $msg['success'] =  false;
        if($result) $msg['success'] = true;
        else $msg['seuccess']  = false;
        echo json_encode($msg);
    }

    function DoDeletePemasok(){
        $result = $this->model->DeleteDataPemasok();
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }

    function DoInsertPelanggan(){
        $isIdExist = $this->model->GetDataPelanggan($this->input->post('kode_pelanggan'));
        $msg['success'] = false;
            if(count($isIdExist) > 0){
               $msg['success'] = false;
               $this->session->set_flashdata('error', 'Data Pelanggan Sudah Ada, Silahkan Cek Tabel Pelanggan Terlebih Dahulu !');            
            }else{
               $result =  $this->model->InsertDataPelanggan();              
               if($result){
                     $this->session->set_flashdata('success', 'Data Pelanggan Berhasil Ditambah!');
                     $msg['success'] = true;
                }else{
                    $this->session->set_flashdata('error', 'Gagal Menambah Data Pelanggan, Kesalahan Pada Query Database !');   
                    $msg['success'] = false;
                }     
            }    
        echo json_encode($msg);
    }
    
    function DoUpdatePelanggan($id){
        $result = $this->model->UpdateDataPelanggan($id);
        $msg['success'] =  false;
        if($result) $msg['success'] = true;
        else $msg['seuccess']  = false;
        echo json_encode($msg);
    }

    function DoDeletePelanggan(){
        $result = $this->model->DeleteDataPelanggan();
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }

    function DoInsertUser(){
        $isIdExist = $this->model->GetDataUser($this->input->post('id_user'));
        $msg['success'] = false;
            if(count($isIdExist) > 0){
               $msg['success'] = false;
               $this->session->set_flashdata('error', 'Data Pengguna Sudah Ada, Silahkan Cek Tabel User Terlebih Dahulu !');            
            }else{
               $result =  $this->model->InsertDataUser();              
               if($result){
                     $this->session->set_flashdata('success', 'Data Pengguna Berhasil Ditambah!');
                     $msg['success'] = true;
                }else{
                    $this->session->set_flashdata('error', 'Gagal Menambah Data Pengguna, Kesalahan Pada Query Database !');   
                    $msg['success'] = false;
                }     
            }    
        echo json_encode($msg);
    }
    
    function DoUpdateUser($id){
        $result = $this->model->UpdateDataUser($id);
        $msg['success'] =  false;
        if($result) $msg['success'] = true;
        else $msg['seuccess']  = false;
        echo json_encode($msg);
    }

    function DoDeleteUser(){
        $result = $this->model->DeleteDataUser();
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }
}


/* End of file Master.php */
