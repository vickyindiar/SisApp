<div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <form id="form-kategori" method="POST">
        <div class="modal-content" id="modalKategori-content">
            <div class="modal-header">
                <h4 class="modal-title" id="kategoriModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="body">                              
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kode_kategori" name="kode_kategoribarang" class="form-control">
                                          <label class="form-label">Kode Kategori</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
                                          <label class="form-label">Nama Kategori</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="keterangan" name="keterangan" class="form-control">
                                          <label class="form-label">Keterangan</label>
                                      </div>
                                  </div>                                               
                          </div>
                      </div>
                  </div>
              </div>           
            </div>
            <div class="modal-footer js-sweetalert">
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="SimpanBarang()" >Simpan</button>
                <button type="button" class="btn btn-danger btn-link waves-effect" style="float:left; color:white" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </form>
    </div>
</div>


<script>
$(function(){
            var dtKategori =  {
                datatype: 'json',
                datafields:[
                {name :'kode_kategoribarang', type: 'string'},
                {name: 'nama_kategori', type: 'string'},
                {name: 'keterangan', type: 'string'}],
                id: 'kode_kategoribarang',
                url: '<?php echo base_url() ?>Master/ShowDataKategori',
                async: false
            };
            var dtKategoriAdapter = new $.jqx.dataAdapter(dtKategori, {
                    autoBind: true
            });
            var dtGridKategori = new $.jqx.dataAdapter(dtKategori);
            $("#GridKategori").jqxGrid({
                source : dtGridKategori,
                width : '100%',
                theme: 'bootstrap',
                sortable: true,
                pageable: true, 
                columns : [
                {text:'Kode Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Kategori', datafield:'nama_kategori', cellsalign:'center', align:'center'},  
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'} ]
            });
});

function ModalTambahKategori(){
    $("#kategoriModal").modal('show');
    $("#form-kategori")[0].reset();
    $("#modalKategori-content").find('.form-line').removeClass('focused');
    $("#modalKategori-content").find('.modal-title').text('TAMBAH DATA');

    $("#form-barang").attr('action', '<?php echo base_url()?>Master/DoInsertBarang');
    StatusBtnSimpan = 'tambah';    
}

</script>