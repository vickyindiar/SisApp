<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Master_model','model');
    }

    function Barang(){
        $this->template->set('title', 'Barang');
        $this->template->load('main_layout','contents', 'Master/barang_view');
    }
    function Kategori(){
        $this->template->set('title', 'Kategori');
        $this->template->load('main_layout','contents', 'Master/kategori_view');
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

    function ShowDataUser(){
        $result = $this->model->GetDataUser();
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
        echo $msg;
    }

    function DoDeleteBarang($id){
        $result = $this->model->DeleteDataBarang($id);
        $msg['success'] = false;
        if($result) $msg['success'] = true;
        else $msg['success'] = false; 
        echo json_encode($msg);
    }


}


/* End of file Master.php */
