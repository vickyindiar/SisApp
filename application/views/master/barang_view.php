<style>
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
</style>
<div class="row">    
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6">              
                        <button type="button" id="btn-tambah-barang" class="btn btn-danger waves-effect">  <!-- onclick="btnTambahOnClick() -->
                            <i class="material-icons">playlist_add</i>
                            <span>Tambah Data</span>
                        </button>  
                     </div>
                  </div>
                   <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div id="GridBarang">                 
                        </div>
                   </div>
            </div>   
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
     <form id="form-barang" method="POST">
        <div class="modal-content" id="modalBarang">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>
            <div class="modal-body">
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card">
                          <div class="body">                              
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="kode_barang" name="kode_barang" class="form-control">
                                          <label class="form-label">Kode Barang</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                                          <label class="form-label">Nama Barang</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="harga_beli" name="harga_beli" class="form-control">
                                          <label class="form-label">Harga Beli</label>
                                      </div>
                                  </div>

                                 <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="harga_jual" name="harga_jual" class="form-control">
                                          <label class="form-label">Harga Jual</label>
                                      </div>
                                  </div>                            
                                                                                                                                  
                                 <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="number" id="stok" name="stok" class="form-control">
                                          <label class="form-label">Stok</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="satuan" name="satuan" class="form-control">
                                          <label class="form-label">Satuan</label>
                                      </div>
                                  </div>
                                 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-3">
                                              <label class="form-label" style="padding-top:3px">Kategori : </label> 
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="hidden" name="kategori" hidden>
                                              <div id="dropdownKategori" class="nopadding">
                                                  <div style="border-color: transparent;" id="GridKategori"> </div>
                                              </div>
                                            </div>
                                        </div>  
                                    </div>    
                                                           
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                 <label class="form-label" style="padding-top:3px">Pemasok : </label> 
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="pemasok">                                       
                                                <div id="dropdownPemasok" class="nopadding">
                                                    <div style="border-color: transparent;" id="GridPemasok"> </div>
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
                <button type="button" id="simpan" class="btn btn-primary btn-link waves-effect"  style="float:left; color:white" onclick="btnSimpanOnClick()" >Simpan</button>
                <button type="button" class="btn btn-danger btn-link waves-effect" style="float:left; color:white" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </form>
    </div>
</div>

<script>
var StatusBtnSimpan;

function btnUbahOnClick(e){
   $("#largeModal").modal('show');
   $("#form-barang")[0].reset();
   $("#modalBarang").find('.modal-title').text('UBAH DATA');
   var rowindex = $('#GridBarang').jqxGrid('getselectedrowindex');
   var row = $("#GridBarang").jqxGrid('getrowdata', rowindex);
   var cols = $("#GridBarang").jqxGrid('columns');
   for(var i = 0; i<cols.records.length;i++){
       var fieldname = cols.records[i].datafield.toString();
       if(row[fieldname] != "" || null){
           $('#'+fieldname).parent().removeClass();
           $('#'+fieldname).parent().addClass('form-line focused');
           $('input[name='+fieldname+']').val(row[fieldname]);

           if(fieldname == 'kode_kategoribarang'){
              var tempcon = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row[fieldname] +'</div>';
              $("#dropdownKategori").jqxDropDownButton('setContent', tempcon);
              $('input[name=kategori]').val(row[fieldname]);
           }
           else if( fieldname == 'kode_pemasok'){
             var tempcon = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row[fieldname] +'</div>';
             $("#dropdownPemasok").jqxDropDownButton('setContent', tempcon);
             $('input[name=pemasok]').val(row[fieldname]);
           }
       }
   }

   $("#form-barang").attr('action', '<?php echo base_url()?>Master/DoUpdateBarang/'+ row['kode_barang']);
   StatusBtnSimpan = 'ubah'; 
}

function btnTambahOnClick(){
    $("#largeModal").modal('show');
    $("#form-barang")[0].reset();
    $("#modalBarang").find('.form-line').removeClass('focused');
    $("#modalBarang").find('.modal-title').text('Tambah Data');
    var TempContentKategori = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Kategori' +'</div>';
    $("#dropdownKategori").jqxDropDownButton('setContent', TempContentKategori);
    var TempContentPemasok = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Pemasok' +'</div>';
    $("#dropdownPemasok").jqxDropDownButton('setContent', TempContentPemasok);  
    $("#form-barang").attr('action', '<?php echo base_url()?>Master/DoInsertBarang');
    StatusBtnSimpan = 'tambah';     
}

function btnSimpanOnClick(){
    var url = $("#form-barang").attr('action');
    var data = $("#form-barang").serialize();
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#largeModal").modal('hide');
                $("#form-barang")[0].reset();
                swal({
                        title: "Good job!", 
                        text: "Data Barang Berhasil "  + statAction + " !",        
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                });
                $('#GridBarang').jqxGrid('updatebounddata');
            }else{
                swal({
                        title: "Cek Kembali !", 
                        text: "Data Barang Gagal "  + statAction + " ! (error response)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
            }
        },
        error: function(){
                swal({
                        title: "Lapor Admin !", 
                        text: "Data Barang Gagal "  + statAction + " ! (error ajax)",        
                        type: "error",
                        timer: 2000,
                        showConfirmButton: true
                });
        }
    });
}

function btnHapusOnClick(e){
   var index = e;
   var row = $("#GridBarang").jqxGrid('getrowdata', index);
   var id = row['kode_barang'];
   swal({
            title: "Yakin Hapus Data "+ id +" ?",
            text: "Data tidak dapat dikembalikan jika sudah dihapus !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus Data !",
            cancelButtonText: "Tidak, Jangan Hapus!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
            $.ajax({
                    type: 'GET',
                    url : '<?php echo base_url() ?>Master/DoDeleteBarang/'+id,
                    dataType : 'JSON',
                    success: function(result){
                        swal({
                            title: "Good job!", 
                            text: "Data "+ id +" Barang Berhasil Dihapus !",        
                            type: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                        $('#GridBarang').jqxGrid('updatebounddata');
                    },
                    erorr: function(){
                        swal({
                            title: "Lapor Admin !", 
                            text: "Data Barang Gagal Dihapus ! (error ajax)",        
                            type: "error",
                            timer: 2000,
                            showConfirmButton: true
                       });
                    }
            });
        } else {
            swal({
                title: "Dibatalkan !",
                text: "Data "+ id +" Batal Dihapus ! (error ajax)",    
                type: "error",    
                timer: 2000,
                showConfirmButton: true
             });
        }
    });
 }


 $(function () {

        $("#btn-tambah-barang").on('click', function(){
            var commit = $("#GridBarang").jqxGrid('addrow', null, {}, 'first');

        });


         var btnAction = function(row, datafield, value){
           return ('<button type="button"  style="width:30%; margin-left:20%" class="btn btn-xs bg-teal waves-effect waves-float" onclick="btnUbahOnClick('+row+')"> <i class="material-icons">mode_edit</i></button> <button type="button" style="width:30%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusOnClick('+row+')"> <i class="material-icons">delete_forever</i></button>');
         }
         var dtKategori =  {
           datatype: 'json',
           datafields:[
           {name :'kode_kategoribarang', type: 'string'},
           {name: 'nama_kategori', type: 'string'}],
           id: 'kode_kategoribarang',
           url: '<?php echo base_url() ?>Master/ShowDataKategori',
           async: false
         };

         var dtKategoriAdapter = new $.jqx.dataAdapter(dtKategori, {
                autoBind: true,
                beforeLoadComplete: function (records) {
                    var data = new Array();                
                    for (var i = 0; i < records.length; i++) {
                        var employee = records[i];
                        employee.nama_kategori = employee.nama_kategori;
                        employee.kode_kategoribarang = employee.uid;
                        data.push(employee);
                    }
                    return data;
                }
        });

         var dtBarang = 
         {
              datatype: "json",
              datafields: [
                {name : 'kode_barang'}, 
                {name : 'nama_barang'},
                {name :'harga_beli', type:'number'},
                {name :'harga_jual', type:'number'},
                {name :'stok'},
                {name :'satuan'},
                {name :'kode_kategoribarang', values : { source:dtKategoriAdapter.records, name:'nama_kategori'}},
                {name :'kode_pemasok'},               
                ],
              url:'<?php echo base_url()?>Master/ShowDataBarang',
              pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
              }
         }
         var dtBarangAdapter = new $.jqx.dataAdapter(dtBarang); 

         $("#GridBarang").jqxGrid({
              source : dtBarangAdapter,
              width : '100%',
              theme: 'bootstrap',
              //columnsresize: true,
              //---> sort and filter
              sortable: true,
              filterable: true,
              altrows: true,
              showfilterrow: true,
              filterable: true,
              //---> end sort and filter

              //-->pagging
              pageable: true,    
              //autoheight: true,         
              // /columnsresize: true,
              pagermode: 'simple',
              //-->end pagging
              editable: true,
              selectionmode: 'singlerow',
              editmode: 'selectedrow',

              columns : [
                {text:'Kode Barang', datafield:'kode_barang', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Nama Barang', datafield:'nama_barang', cellsalign:'center', align:'center'},
                {text:'Harga Beli', datafield:'harga_beli', cellsalign:'center', align:'center', cellsformat:'c2'},
                {text:'Harga Jual', datafield:'harga_jual', cellsalign:'center', align:'center'},
                {text:'Stok', datafield:'stok', cellsalign:'center', align:'center'},
                {text:'Satuan', datafield:'satuan', cellsalign:'center', align:'center'},
                {text:'Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center'},
                {text:'Pemasok', datafield:'kode_pemasok', cellsalign:'center', align:'center'},
                {text:'Action', datafield:'action', cellsalign:'center', align:'center', cellsrenderer: btnAction},
                ],
         }); 
         


         //===========> GridSelectKategori
         function btnOkKategori(){
            var element = $("<div style='float: right; margin-left:10px; margin-top:2px'></div>");
            var okbtn = $("<div style='padding: 0px; float: left; margin-right: 10px;'><div style='margin-left: 7px; width: 16px; height: 16px;'>OK</div></div>");
            okbtn.width(36);
            okbtn.jqxButton({ theme: 'bootstrap', template:'primary' });
            okbtn.appendTo(element);      
            $("#pagerGridKategori").children().children().last('div').remove();  
            element.appendTo($("#pagerGridKategori").children());
            okbtn.click(function(){
            $("#dropdownKategori").jqxDropDownButton('close');
            });
         }
         var dtKategori = 
         {
            datatype: "json",
            datafields: [ {name :'kode_kategoribarang'}, {name :'nama_kategori'}, {name :'keterangan'} ],
            url:'<?php echo base_url()?>Master/ShowDataKategori',
         }
        
         var dtKategoriAdapter = new $.jqx.dataAdapter(dtKategori); 
         $("#GridKategori").jqxGrid({
              source : dtKategoriAdapter,
              width: '100%',
              theme: 'bootstrap',
              columnsresize: true,
              pageable: true,    
              pagermode: 'simple',
              autoheight: true,
              //pagerrenderer :  btnOkKategori,
              columns : [
                {text:'Kode Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Nama Kategori', datafield:'nama_kategori', cellsalign:'center', align:'center'},
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'},
                ],
         });
         btnOkKategori();
         $("#dropdownKategori").jqxDropDownButton({width: '100%', height:25});
         $("#GridKategori").on('rowselect', function(event){
            var args = event.args;
            var row = $('#GridKategori').jqxGrid('getrowdata', args.rowindex);
            var content = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row['nama_kategori'] +'</div>';
            $("#dropdownKategori").jqxDropDownButton('setContent', content);
            $('input[name=kategori]').val(row['kode_kategoribarang']);
         }); 
         var TempContentKategori = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Kategori' +'</div>';
         $("#dropdownKategori").jqxDropDownButton('setContent', TempContentKategori);


           //===========> GridSelectPemasok
        function btnOkPemasok(){
            var element = $("<div style='float: right; margin-left:10px  margin-top:2px' ></div>");
            var okbtn = $("<div style='padding: 0px; float: left; margin-right: 10px;'><div style='margin-left: 7px; width: 16px; height: 16px;'>OK</div></div>");
            okbtn.width(36);
            okbtn.jqxButton({ theme: 'bootstrap', template:'primary' });
            okbtn.appendTo(element);
            $("#pagerGridPemasok").children().children().last('div').remove();  
            element.appendTo($("#pagerGridPemasok").children());
            okbtn.click(function(){
                $("#dropdownPemasok").jqxDropDownButton('close');
            });
        }
        var dtPemasok = 
        {
            datatype: "json",
            datafields: [{name :'kode_pemasok'}, {name :'nama_pemasok'}, {name :'kota'}, {name :'keterangan'} ],
            url:'<?php echo base_url()?>Master/ShowDataPemasok',
        }
        
        var dtPemasokAdapter = new $.jqx.dataAdapter(dtPemasok); 
        $("#GridPemasok").jqxGrid({
              source : dtPemasokAdapter,
              width: '100%',
              theme: 'bootstrap',
              columnsresize: true,
              pageable: true,    
              pagermode: 'simple',
              autoheight: true, 
              columns : [
                {text:'Nama Pemasok', datafield:'nama_pemasok', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Kota', datafield:'kota', cellsalign:'center', align:'center'},
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'},
                ],
         });
         btnOkPemasok();
         $("#dropdownPemasok").jqxDropDownButton({width: '100%', height:25});
         $("#GridPemasok").on('rowselect', function(event){
            var args = event.args;
            var row = $('#GridPemasok').jqxGrid('getrowdata', args.rowindex);
            var content = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row['nama_pemasok'] +'</div>';
            $("#dropdownPemasok").jqxDropDownButton('setContent', content);
            $('input[name=pemasok]').val(row['kode_pemasok']);
         }); 
         var TempContentPemasok = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Pemasok' +'</div>';
         $("#dropdownPemasok").jqxDropDownButton('setContent', TempContentPemasok);
 });
</script>
