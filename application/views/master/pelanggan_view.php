<div class="modal fade" id="pelangganModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <form id="form-pelanggan" method="POST" enctype="multipart/form-data">
        <div class="modal-content" id="modalPelanggan-content">
            <div class="modal-header">
                <h4 class="modal-title" id="pelangganModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="body">                              
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kode_pelanggan" name="kode_pelanggan" class="form-control">
                                          <label class="form-label">Kode Pelanggan</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">
                                          <label class="form-label">Nama Pelanggan</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="alamat" name="alamat" class="form-control">
                                          <label class="form-label">Alamat</label>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kota" name="kota" class="form-control">
                                          <label class="form-label">Kota</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="provinsi" name="provinsi" class="form-control">
                                          <label class="form-label">Provinsi</label>
                                      </div>
                                  </div>

                                 <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="no_tlp1" name="no_tlp1" class="form-control">
                                          <label class="form-label">Tlp 1</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="no_tlp2" name="no_tlp2" class="form-control">
                                          <label class="form-label">Tlp 2</label>
                                      </div>
                                  </div>    
                                  
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_toko_pelanggan" name="nama_toko_pelanggan" class="form-control">
                                          <label class="form-label">Nama Toko Pelanggan</label>
                                      </div>
                                  </div>                          
                                                                                                                                
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="keterangan" name="keterangan" class="form-control">
                                          <label class="form-label">Keterangan</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                            <input type="file" id="foto_pelanggan" name="foto_pelanggan"/>
                                      </div>
                                  </div>  
                                                                                     
                          </div>
                      </div>
                  </div>
              </div>           
            </div>
            <div class="modal-footer js-sweetalert">
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="SimpanPelanggan()" >Simpan</button>
                <button type="button" class="btn btn-danger btn-link waves-effect" style="float:left; color:white" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </form>
    </div>
</div>


<script>
$(function(){
            var getPelanggan = {
              datatype: "json",
              datafields: [
                {name : 'kode_pelanggan'}, 
                {name : 'nama_pelanggan'},
                {name :'alamat'},
                {name :'kota'},
                {name :'provinsi'},
                {name :'no_tlp1', type:'number'},
                {name :'no_tlp2', type:'number'},
                {name :'nama_toko_pelanggan'},
                {name :'foto_pelanggan'},
                {name :'keterangan'},               
                ],
              url:'<?php echo base_url()?>Master/ShowDataPelanggan',
              pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
              }
            }
            var pelanggan_imagerenderer = function (row, datafield, value) {
                return '<img style="margin-left: 5px;" height="60" width="50" src="http://localhost/SisApp/assets/images/foto_pelanggan/' + value + '"/>';
            }
            var dtPelanggan = new $.jqx.dataAdapter(getPelanggan); 
            $("#GridPelanggan").jqxGrid({
                source : dtPelanggan,
                width : '100%',
                rowsheight: 60,
                theme: 'bootstrap',
                columnsresize: true,
                sortable: true,
                pageable: true, 
                columns : [
                {text:'#', datafield:'kode_pelanggan', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Pelanggan', datafield:'nama_pelanggan', cellsalign:'center', align:'center'},   
                {text:'Alamat', datafield:'alamat', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Kota', datafield:'kota', cellsalign:'center', align:'center'},  
                {text:'Provinsi', datafield:'provinsi', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'No Tlp 1', datafield:'no_tlp1', cellsalign:'center', align:'center'},  
                {text:'No Tlp 2', datafield:'no_tlp2', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Nama Toko/Usaha', datafield:'nama_toko_pelanggan', cellsalign:'center', align:'center'}, 
                {text:'Foto', datafield: 'foto_pelanggan', width: 60, cellsrenderer: pelanggan_imagerenderer }, 
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'},              
                ]
            });
});



function ModalTambahPelanggan(){
    $("#pelangganModal").modal('show');
    $("#form-pelanggan")[0].reset();
    $("#modalPelanggan-content").find('.form-line').removeClass('focused');
    $("#modalPelanggan-content").find('.modal-title').text('TAMBAH DATA');
    $("#form-pelanggan").attr('action', '<?php echo base_url()?>Master/DoInsertPelanggan');
    StatusBtnSimpan = 'tambah';    
}

function ModalUbahPelanggan(e){
   var rowindex = $('#GridPelanggan').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        $("#pelangganModal").modal('show');
        $("#form-pelanggan")[0].reset();
        $("#modalPelanggan-content").find('.modal-title').text('UBAH DATA');
        var row = $("#GridPelanggan").jqxGrid('getrowdata', rowindex);
        var cols = $("#GridPelanggan").jqxGrid('columns');
        for(var i = 0; i<cols.records.length;i++){
            var fieldname = cols.records[i].datafield.toString();
            if(row[fieldname] != "" || null){
                $('#'+fieldname).parent().removeClass();
                $('#'+fieldname).parent().addClass('form-line focused');
                $('input[name='+fieldname+']').val(row[fieldname]);
            }
        }
        $("#form-pelanggan").attr('action', '<?php echo base_url()?>Master/DoUpdatePelanggan/'+ row['kode_pelanggan']);
        StatusBtnSimpan = 'ubah'; 
   } 
}

function HapusPelanggan(){
    var rowindex = $('#GridPelanggan').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan dihapus terlebih dahulu !');
   }else{
        var row = $("#GridPelanggan").jqxGrid('getrowdata', rowindex);
        var rID = row['kode_pelanggan'];
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
                    url: '<?php echo base_url() ?>Master/DoDeletePelanggan',
                    data : {id : rID},
                    dataType: "json",
                    success: function(response){
                         swal({  title: "Good job!",  text: "Data Pelanggan Berhasil DiHapus !", type: "success", timer: 1000, showConfirmButton: false }); 
                         $('#GridPelanggan').jqxGrid('updatebounddata');     
                    },
                    error: function(response){
                         swal({ title: "Lapor Admin !", text: "Data Pelanggan Gagal DiHapus ! (error ajax)", type: "error", timer: 2000, showConfirmButton: true });
                    }       
                });
        });
   }
}

function SimpanPelanggan(){
    var url = $("#form-pelanggan").attr('action');
    var data = new FormData($(this)[0]);
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#pelangganModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#form-pelanggan")[0].reset();
                swal({
                        title: "Good job!", 
                        text: "Data Pelanggan Berhasil "  + statAction + " !",        
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                });
                $('#GridPelanggan').jqxGrid('updatebounddata');
            }else{
                swal({
                        title: "Cek Kembali !", 
                        text: "Data Pelanggan Gagal "  + statAction + " ! (error response)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
            }
        },
        error: function(){
                swal({
                        title: "Lapor Admin !", 
                        text: "Data Pelanggan Gagal "  + statAction + " ! (error ajax)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
        }
    });

}

</script>