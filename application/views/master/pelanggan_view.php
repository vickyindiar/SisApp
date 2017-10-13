<div class="modal fade" id="pelangganModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <!-- <form id="form-pelanggan" method="POST" enctype="multipart/form-data"> -->
     <?php echo form_open_multipart('', array('id'=>'form-pelanggan', 'method'=>'POST'));?>
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
                                          <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">
                                          <label class="form-label">Nama Pelanggan</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="alamat_pelanggan" name="alamat_pelanggan" class="form-control">
                                          <label class="form-label">Alamat</label>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kota_pelanggan" name="kota_pelanggan" class="form-control">
                                          <label class="form-label">Kota</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="provinsi_pelanggan" name="provinsi_pelanggan" class="form-control">
                                          <label class="form-label">Provinsi</label>
                                      </div>
                                  </div>

                                 <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="no_tlp1_pelanggan" name="no_tlp1_pelanggan" class="form-control">
                                          <label class="form-label">Tlp 1</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="no_tlp2_pelanggan" name="no_tlp2_pelanggan" class="form-control">
                                          <label class="form-label">Tlp 2</label>
                                      </div>
                                  </div>    
      
                                 <input type="hidden" class="datepicker form-control" id="tgl_terdaftar" name="tgl_terdaftar"placeholder="Please choose a date...">

                                  
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_toko_pelanggan" name="nama_toko_pelanggan" class="form-control">
                                          <label class="form-label">Nama Toko Pelanggan</label>
                                      </div>
                                  </div>                          
                                                                                                                                
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="keterangan_pelanggan" name="keterangan_pelanggan" class="form-control">
                                          <label class="form-label">Keterangan</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                            <input type="file" name="foto_pelanggan" id="foto_pelanggan"/>
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
                {name :'alamat_pelanggan'},
                {name :'kota_pelanggan'},
                {name :'provinsi_pelanggan'},
                {name :'tgl_terdaftar_pelanggan'},
                {name :'no_tlp1_pelanggan', type:'number'},
                {name :'no_tlp2_pelanggan', type:'number'},
                {name :'tgl_terdaftar_pelanggan', type: 'date'},
                {name :'nama_toko_pelanggan'},
                {name :'foto_pelanggan'},
                {name :'keterangan_pelanggan'},               
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
                {text:'Alamat', datafield:'alamat_pelanggan', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Kota', datafield:'kota_pelanggan', cellsalign:'center', align:'center'},  
                {text:'Provinsi', datafield:'provinsi_pelanggan', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'No Tlp 1', datafield:'no_tlp1_pelanggan', cellsalign:'center', align:'center'},  
                {text:'No Tlp 2', datafield:'no_tlp2_pelanggan', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Terdaftar', datafield:'tgl_terdaftar_pelanggan', cellsalign:'center', align:'center', cellsformat: 'dd-MM-yyyy'/*pinned:'true'*/},
                {text:'Nama Toko/Usaha', datafield:'nama_toko_pelanggan', cellsalign:'center', align:'center'}, 
                {text:'Foto', datafield: 'foto_pelanggan', width: 60, cellsrenderer: pelanggan_imagerenderer }, 
                {text:'Keterangan', datafield:'keterangan_pelanggan', cellsalign:'center', align:'center'},              
                ]
            });
});
function getTglTerdaftar(){
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' +
        ((''+day).length<2 ? '0' : '') + day;
    return output;
}


function ModalTambahPelanggan(){
    $("#pelangganModal").modal('show');
    $("#form-pelanggan")[0].reset();
    $("#modalPelanggan-content").find('.form-line').removeClass('focused');
    $("#modalPelanggan-content").find('.modal-title').text('TAMBAH DATA');
    $('input[name=tgl_terdaftar]').val(getTglTerdaftar());
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
   // var data = $("#form-pelanggan").serialize();
    var formData = new FormData($("#form-pelanggan")[0]);
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#pelangganModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        dataType: "json",
        async : false,
            cache : false,
            contentType : false,
            processData : false,
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