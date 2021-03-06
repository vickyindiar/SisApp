<div class="modal fade" id="pemasokModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <form id="form-pemasok" method="POST">
        <div class="modal-content" id="modalPemasok-content">
            <div class="modal-header">
                <h4 class="modal-title" id="pemasokModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="body">                              
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kode_pemasok" name="kode_pemasok" class="form-control">
                                          <label class="form-label">Kode Pemasok</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_pemasok" name="nama_pemasok" class="form-control">
                                          <label class="form-label">Nama Pemasok</label>
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
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="SimpanPemasok()" >Simpan</button>
                <button type="button" class="btn btn-danger btn-link waves-effect" style="float:left; color:white" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </form>
    </div>
</div>



<script>
$(function(){
            var getPemasok = {
              datatype: "json",
              datafields: [
                {name : 'kode_pemasok'}, 
                {name : 'nama_pemasok'},
                {name :'alamat'},
                {name :'kota'},
                {name :'provinsi'},
                {name :'no_tlp1', type:'number'},
                {name :'no_tlp2', type:'number'},
                {name :'keterangan'},               
                ],
              url:'<?php echo base_url()?>Master/ShowDataPemasok',
              pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
              }
            }
            var dtPemasok = new $.jqx.dataAdapter(getPemasok); 
            $("#GridPemasok").jqxGrid({
                source : dtPemasok,
                width : '100%',
                theme: 'bootstrap',
                sortable: true,
                pageable: true, 
                columns : [
                {text:'Kode Pemasok', datafield:'kode_pemasok', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Pemasok', datafield:'nama_pemasok', cellsalign:'center', align:'center'},   
                {text:'Alamat', datafield:'alamat', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Kota', datafield:'kota', cellsalign:'center', align:'center'},  
                {text:'Provinsi', datafield:'provinsi', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'No Tlp 1', datafield:'no_tlp1', cellsalign:'center', align:'center'},  
                {text:'No Tlp 2', datafield:'no_tlp2', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'},              
                ]
            });
});



function ModalTambahPemasok(){
    $("#pemasokModal").modal('show');
    $("#form-pemasok")[0].reset();
    $("#modalPemasok-content").find('.form-line').removeClass('focused');
    $("#modalPemasok-content").find('.modal-title').text('TAMBAH DATA');
    $("#form-pemasok").attr('action', '<?php echo base_url()?>Master/DoInsertPemasok');
    StatusBtnSimpan = 'tambah';    
}

function ModalUbahPemasok(e){
   var rowindex = $('#GridPemasok').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        $("#pemasokModal").modal('show');
        $("#form-pemasok")[0].reset();
        $("#modalPemasok-content").find('.modal-title').text('UBAH DATA');
        var row = $("#GridPemasok").jqxGrid('getrowdata', rowindex);
        var cols = $("#GridPemasok").jqxGrid('columns');
        for(var i = 0; i<cols.records.length;i++){
            var fieldname = cols.records[i].datafield.toString();
            if(row[fieldname] != "" || null){
                $('#'+fieldname).parent().removeClass();
                $('#'+fieldname).parent().addClass('form-line focused');
                $('input[name='+fieldname+']').val(row[fieldname]);
            }
        }
        $("#form-pemasok").attr('action', '<?php echo base_url()?>Master/DoUpdatePemasok/'+ row['kode_pemasok']);
        StatusBtnSimpan = 'ubah'; 
   } 
}

function HapusPemasok(){
    var rowindex = $('#GridPemasok').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan dihapus terlebih dahulu !');
   }else{
        var row = $("#GridPemasok").jqxGrid('getrowdata', rowindex);
        var rID = row['kode_pemasok'];
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
                    url: '<?php echo base_url() ?>Master/DoDeletePemasok',
                    data : {id : rID},
                    dataType: "json",
                    success: function(response){
                         swal({  title: "Good job!",  text: "Data Pemasok Berhasil DiHapus !", type: "success", timer: 1000, showConfirmButton: false }); 
                         $('#GridPemasok').jqxGrid('updatebounddata');     
                    },
                    error: function(response){
                         swal({ title: "Lapor Admin !", text: "Data Pemasok Gagal DiHapus ! (error ajax)", type: "error", timer: 2000, showConfirmButton: true });
                    }       
                });
        });
   }
}

function SimpanPemasok(){
    var url = $("#form-pemasok").attr('action');
    var data = $("#form-pemasok").serialize();
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#pemasokModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#form-pemasok")[0].reset();
                swal({
                        title: "Good job!", 
                        text: "Data Pemasok Berhasil "  + statAction + " !",        
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                });
                $('#GridPemasok').jqxGrid('updatebounddata');
            }else{
                swal({
                        title: "Cek Kembali !", 
                        text: "Data Pemasok Gagal "  + statAction + " ! (error response)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
            }
        },
        error: function(){
                swal({
                        title: "Lapor Admin !", 
                        text: "Data Pemasok Gagal "  + statAction + " ! (error ajax)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
        }
    });

}

</script>