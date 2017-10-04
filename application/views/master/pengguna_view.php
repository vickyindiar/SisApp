<div class="modal fade" id="penggunaModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <form id="form-pengguna" method="POST">
        <div class="modal-content" id="modalPengguna-content">
            <div class="modal-header">
                <h4 class="modal-title" id="penggunaModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="body">                              
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="id_user" name="id_user" class="form-control">
                                          <label class="form-label">Kode Pengguna</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="username" name="username" class="form-control">
                                          <label class="form-label">Nama Pengguna</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" id="password" name="password" class="form-control">
                                          <label class="form-label">Password</label>
                                      </div>
                                  </div>
                                
                                  <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <input type="hidden" name="id_akses" hidden>
                                              <div id="dropdownAkses">
                                                  <div id="SelectAkses"> </div>
                                              </div>
                                            </div>
                                        </div>  
                                    </div>                                                                                                          
                                </div>

                          </div>
                      </div>
                  </div>
              </div>           
            </div>
            <div class="modal-footer js-sweetalert">
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="SimpanPengguna()" >Simpan</button>
                <button type="button" class="btn btn-danger btn-link waves-effect" style="float:left; color:white" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </form>
    </div>
</div>



<script>
$(function(){
            var callAkses =  {
                datatype: 'json',
                datafields:[
                {name :'id_akses'},
                {name: 'label', type: 'string'},
                {name: 'level_akses', type: 'string'}],
                id: 'id_akses',
                url: '<?php echo base_url() ?>Master/ShowDataAkses',
                async: false
            };
            var dtAkses = new $.jqx.dataAdapter(callAkses,  { autoBind: true });
            conAkses = dtAkses;
            var callUser = {
                datatype: "json",
                datafield:[
                    {name:"id_user"},
                    {name:"username"},
                    {name:"password"},
                    {nama:"id_akses"},
                    {nama:"levelakses", value:'id_akses', values : { source:dtAkses.records, value: 'id_akses', name:'level_akses'}}
                ],
                url:'<?php echo base_url()?>Master/ShowDataUser' 
            }

            var dtUser = new $.jqx.dataAdapter(callUser);
            $("#GridPengguna").jqxGrid({
                source : dtUser,
                width : '100%',
                theme: 'bootstrap',
                sortable: true,
                pageable: true, 
                columns : [
                {text:'Kode Pengguna', datafield:'id_user', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Pengguna', datafield:'username', cellsalign:'center', align:'center'},
                {text:'Password', datafield:'password', cellsalign:'center', align:'center'},
                {text:'Level User', datafield:'id_akses', displayfield: 'levelakses', cellsalign:'center', align:'center'},
                ]
            });


        //===========> GridSelectAkses
        function btnOkAkses(){
            var element = $("<div style='float: right; margin-right:10px  margin-top:2px' ></div>");
            var okbtn = $("<div style='padding: 0px; float: left; margin-right: 10px;'><div style='margin-left: 7px; width: 16px; height: 16px;'>OK</div></div>");
            okbtn.width(36);
            okbtn.jqxButton({ theme: 'bootstrap', template:'primary' });
            okbtn.appendTo(element);
            $("#pagerSelectAkses").children().children().last('div').remove();  
            element.appendTo($("#pagerSelectAkses").children());
            okbtn.click(function(){
                $("#dropdownAkses").jqxDropDownButton('close');
            });
        }
        $("#SelectAkses").jqxGrid({
              source : dtAkses,
              width: 250,
              theme: 'bootstrap',
              columnsresize: true,
              pageable: true,    
              pagermode: 'simple',
              autoheight: true, 
              columns : [
                {text:'#', datafield:'id_akses', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Label', datafield:'label', cellsalign:'center', align:'center'},
                {text:'Level', datafield:'level_akses', cellsalign:'center', align:'center'}, ],
         });
         btnOkAkses();
         $("#dropdownAkses").jqxDropDownButton({width: '100%', height:25});
         $("#SelectAkses").on('rowselect', function(event){
            var args = event.args;
            var row = $('#SelectAkses').jqxGrid('getrowdata', args.rowindex);
            var content = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row['level_akses'] +'</div>';
            $("#dropdownAkses").jqxDropDownButton('setContent', content);
            $('input[name=id_akses]').val(row['id_akses']);
         }); 
         var TempContentAkses = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Akses' +'</div>';
         $("#dropdownAkses").jqxDropDownButton('setContent', TempContentAkses);
});

function ModalTambahPengguna(){
    $("#penggunaModal").modal('show');
    $("#form-pengguna")[0].reset();
    $("#modalPengguna-content").find('.form-line').removeClass('focused');
    $("#modalPengguna-content").find('.modal-title').text('TAMBAH DATA');
    $("#form-pengguna").attr('action', '<?php echo base_url()?>Master/DoInsertUser');
    StatusBtnSimpan = 'tambah';    
}

function ModalUbahPengguna(e){
   var rowindex = $('#GridPengguna').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        $("#penggunaModal").modal('show');
        $("#form-pengguna")[0].reset();
        $("#modalPengguna-content").find('.modal-title').text('UBAH DATA');
        var row = $("#GridPengguna").jqxGrid('getrowdata', rowindex);
        var cols = $("#GridPengguna").jqxGrid('columns');
        for(var i = 0; i<cols.records.length;i++){
            var fieldname = cols.records[i].datafield.toString();
            if(row[fieldname] != "" || null){
                $('#'+fieldname).parent().removeClass();
                $('#'+fieldname).parent().addClass('form-line focused');
                $('input[name='+fieldname+']').val(row[fieldname]);

                if(fieldname == 'id_akses'){
                    var dtfilter = $.grep(conAkses.loadedData, function(e){return e.id_akses === row[fieldname]});
                    var tempcon = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + dtfilter[0]['level_akses'] +'</div>';
                    $("#dropdownAkses").jqxDropDownButton('setContent', tempcon);
                    $('input[name=id_akses]').val(row[fieldname]);
                }
            }
        }
        $("#form-pengguna").attr('action', '<?php echo base_url()?>Master/DoUpdateUser/'+ row['id_user']);
        StatusBtnSimpan = 'ubah'; 
   } 
}

function HapusPengguna(){
    var rowindex = $('#GridPengguna').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        var row = $("#GridPengguna").jqxGrid('getrowdata', rowindex);
        var rID = row['id_user'];
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
                    url: '<?php echo base_url() ?>Master/DoDeleteUser',
                    data : {id : rID},
                    dataType: "json",
                    success: function(response){
                         swal({  title: "Good job!",  text: "Data Pengguna Berhasil DiHapus !", type: "success", timer: 1000, showConfirmButton: false }); 
                         $('#GridPengguna').jqxGrid('updatebounddata');     
                    },
                    error: function(response){
                         swal({ title: "Lapor Admin !", text: "Data Pengguna Gagal DiHapus ! (error ajax)", type: "error", timer: 2000, showConfirmButton: true });
                    }       
                });
        });
   }
}

function SimpanPengguna(){
    var url = $("#form-pengguna").attr('action');
    var data = $("#form-pengguna").serialize();
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#penggunaModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#form-pengguna")[0].reset();
                swal({
                        title: "Good job!", 
                        text: "Data Pengguna Berhasil "  + statAction + " !",        
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                });
                $('#GridPengguna').jqxGrid('updatebounddata');
            }else{
                swal({
                        title: "Cek Kembali !", 
                        text: "Data Pengguna Gagal "  + statAction + " ! (error response)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
            }
        },
        error: function(){
                swal({
                        title: "Lapor Admin !", 
                        text: "Data Pengguna Gagal "  + statAction + " ! (error ajax)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
        }
    });

}

</script>