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
                                          <input type="text" id="kode_kategoribarang" name="kode_kategoribarang" class="form-control">
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
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="SimpanKategori()" >Simpan</button>
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

    $("#form-kategori").attr('action', '<?php echo base_url()?>Master/DoInsertKategori');
    StatusBtnSimpan = 'tambah';    
}

function ModalUbahKategori(e){
   var rowindex = $('#GridKategori').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        $("#kategoriModal").modal('show');
        $("#form-kategori")[0].reset();
        $("#modalKategori-content").find('.modal-title').text('UBAH DATA');
        var row = $("#GridKategori").jqxGrid('getrowdata', rowindex);
        var cols = $("#GridKategori").jqxGrid('columns');
        for(var i = 0; i<cols.records.length;i++){
            var fieldname = cols.records[i].datafield.toString();
            if(row[fieldname] != "" || null){
                $('#'+fieldname).parent().removeClass();
                $('#'+fieldname).parent().addClass('form-line focused');
                $('input[name='+fieldname+']').val(row[fieldname]);
            }
        }
        $("#form-kategori").attr('action', '<?php echo base_url()?>Master/DoUpdateKategori/'+ row['kode_kategoribarang']);
        StatusBtnSimpan = 'ubah'; 
   } 
}

function HapusKategori(){
    var rowindex = $('#GridKategori').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan dihapus terlebih dahulu !');
   }else{
        var row = $("#GridKategori").jqxGrid('getrowdata', rowindex);
        var rID = row['kode_kategoribarang'];
        swal({
            title: 'Yakin Hapus Data ?',
            text: "Data Tidak Bisa Dikembalikan Jika Sudah Dihapus !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
            }).then(function () {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url() ?>Master/DoDeleteKategori',
                    data : {id : rID},
                    dataType: "json",
                    success: function(response){
                         swal({  title: "Good job!",  text: "Data Kategori Berhasil DiHapus !", type: "success", timer: 1000, showConfirmButton: false }); 
                         $('#GridKategori').jqxGrid('updatebounddata');     
                    },
                    error: function(response){
                         swal({ title: "Lapor Admin !", text: "Data Kategori Gagal DiHapus ! (error ajax)", type: "error", timer: 2000, showConfirmButton: true });
                    }       
                });
        });
   }
}

function SimpanKategori(){
    var url = $("#form-kategori").attr('action');
    var data = $("#form-kategori").serialize();
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#kategoriModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#form-kategori")[0].reset();
                swal({
                        title: "Good job!", 
                        text: "Data Katgeori Berhasil "  + statAction + " !",        
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                });
                $('#GridKategori').jqxGrid('updatebounddata');
            }else{
                swal({
                        title: "Cek Kembali !", 
                        text: "Data Kategori Gagal "  + statAction + " ! (error response)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
            }
        },
        error: function(){
                swal({
                        title: "Lapor Admin !", 
                        text: "Data Kategori Gagal "  + statAction + " ! (error ajax)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
        }
    });

}

</script>