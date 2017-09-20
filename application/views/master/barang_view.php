<style>
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
</style>
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <form id="form-barang" method="POST">
        <div class="modal-content" id="modalBarang-content">
            <div class="modal-header">
                <h4 class="modal-title" id="barangModalLabel"></h4>
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
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <input type="hidden" name="kategori" hidden>
                                              <div id="dropdownKategori">
                                                  <div id="SelectKategori"> </div>
                                              </div>
                                            </div>
                                        </div>  
                                    </div>    
                                                           
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="pemasok">                                       
                                                <div id="dropdownPemasok" class="nopadding">
                                                    <div style="border-color: transparent;" id="SelectPemasok"> </div>
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
                {name: 'nama_kategori', type: 'string'}],
                id: 'kode_kategoribarang',
                url: '<?php echo base_url() ?>Master/ShowDataKategori',
                async: false
            };

            var dtPemasok = 
            {
                datatype: "json",
                datafields: [{name :'kode_pemasok', type: 'string'}, {name :'nama_pemasok', type: 'string'}, {name :'kota', type: 'string'}, {name :'keterangan', type: 'string'} ],
                id: 'kode_pemasok',
                url:'<?php echo base_url()?>Master/ShowDataPemasok',
                async: false
            }
        
            var dtPemasokAdapter = new $.jqx.dataAdapter(dtPemasok,  { autoBind: true }); 
            var dtKategoriAdapter = new $.jqx.dataAdapter(dtKategori, { autoBind: true });
            conKategori = dtKategoriAdapter; conPemasok = dtPemasokAdapter;
            var dtBarang = 
            {
              datatype: "json",
              datafields: [
                {name : 'kode_barang'}, 
                {name : 'nama_barang'},
                {name :'harga_beli', type:'number'},
                {name :'harga_jual', type:'number'},
                {name :'satuan'},
                {name :'stok'},
                {name :'kode_kategoribarang'},
                {name :'kode_pemasok'},  
                {name :'kategoribarang', value:'kode_kategoribarang', values : { source:dtKategoriAdapter.records, value: 'kode_kategoribarang', name:'nama_kategori'}},
                {name :'pemasokbarang', value:'kode_pemasok', values : {source:dtPemasokAdapter.records, value: 'kode_pemasok', name:'nama_pemasok'}},
             
                ],
              url:'<?php echo base_url()?>Master/ShowDataBarang',
              pager: function (pagenum, pagesize, oldpagenum) {
                    // callback called when a page or page size is changed.
              },
            }

            var dtBarangAdapter = new $.jqx.dataAdapter(dtBarang); 
            $("#GridBarang").jqxGrid({
              source : dtBarangAdapter,
              width : '100%',
              theme: 'bootstrap',
              //columnsresize: true,
              sortable: true,
              pageable: true,    
              //autoheight: true,         
              // /columnsresize: true,
              pagermode: 'simple',
              editable: false,
              selectionmode: 'singlerow',      
              columns : [
                {text:'Kode Barang', datafield:'kode_barang', cellsalign:'center', align:'center' /*pinned:'true'*/},
                {text:'Nama Barang', datafield:'nama_barang', cellsalign:'center', align:'center'},
                {text:'Harga Beli', datafield:'harga_beli', cellsalign:'center', align:'center'},
                {text:'Harga Jual', datafield:'harga_jual', cellsalign:'center', align:'center'},
                {text:'Stok', datafield:'stok', cellsalign:'center', align:'center' },
                {text:'Satuan', datafield:'satuan', cellsalign:'center', align:'center', },
                {text:'Kategori', datafield:'kode_kategoribarang', displayfield: 'kategoribarang', cellsalign:'center', align:'center'},
                {text:'Pemasok', datafield:'kode_pemasok', displayfield: 'pemasokbarang', cellsalign:'center', align:'center'}
                ],
            });
            $("#GridBarang").on('cellselect', function (event) {
                var column = $("#GridBarang").jqxGrid('getcolumn', event.args.datafield);
                var value = $("#GridBarang").jqxGrid('getcellvalue', event.args.rowindex, column.datafield);
                var displayValue = $("#GridBarang").jqxGrid('getcellvalue', event.args.rowindex, column.displayfield);

                $("#eventLog").html("<div>Selected Cell<br/>Row: " + event.args.rowindex + ", Column: " + column.text + ", Value: " + value + ", Label: " + displayValue + "</div>");
            });

         //===========> GridSelectKategori
        function btnOkKategori(){
            var element = $("<div style='float: right; margin-right:10px;  margin-top:2px' ></div>");
            var okbtn = $("<div style='padding: 0px; float: left; margin-right: 10px;'><div style='margin-left: 7px; width: 16px; height: 16px;'>OK</div></div>");
            okbtn.width(36);
            okbtn.jqxButton({ theme: 'bootstrap', template:'primary' });
            okbtn.appendTo(element);
            $("#pagerSelectKategori").children().children().last('div').remove();  
            element.appendTo($("#pagerSelectKategori").children());
            okbtn.click(function(){
                $("#dropdownKategori").jqxDropDownButton('close');
            });
        }
         $("#SelectKategori").jqxGrid({
              source : dtKategoriAdapter,
              width: 250,
              theme: 'bootstrap',
              columnsresize: true,
              pageable: true,    
              pagermode: 'simple',
              autoheight: true, 
              columns : [
                {text:'Kode Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Nama Kategori', datafield:'nama_kategori', cellsalign:'center', align:'center'},
                {text:'Keterangan', datafield:'keterangan', cellsalign:'center', align:'center'},
                ],
         });
         btnOkKategori();
         $("#dropdownKategori").jqxDropDownButton({width: '100%', height:25});
         $("#SelectKategori").on('rowselect', function(event){
            var args = event.args;
            var row = $('#SelectKategori').jqxGrid('getrowdata', args.rowindex);
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
            $("#pagerSelectPemasok").children().children().last('div').remove();  
            element.appendTo($("#pagerSelectPemasok").children());
            okbtn.click(function(){
                $("#dropdownPemasok").jqxDropDownButton('close');
            });
        }
        $("#SelectPemasok").jqxGrid({
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
         $("#SelectPemasok").on('rowselect', function(event){
            var args = event.args;
            var row = $('#SelectPemasok').jqxGrid('getrowdata', args.rowindex);
            var content = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + row['nama_pemasok'] +'</div>';
            $("#dropdownPemasok").jqxDropDownButton('setContent', content);
            $('input[name=pemasok]').val(row['kode_pemasok']);
         }); 
         var TempContentPemasok = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Pemasok' +'</div>';
         $("#dropdownPemasok").jqxDropDownButton('setContent', TempContentPemasok);

});


function ModalTambahBarang(){
    $("#barangModal").modal('show');
    $("#form-barang")[0].reset();
    $("#modalBarang-content").find('.form-line').removeClass('focused');
    $("#modalBarang-content").find('.modal-title').text('TAMBAH DATA');

    var TempContentKategori = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Kategori' +'</div>';
    $("#dropdownKategori").jqxDropDownButton('setContent', TempContentKategori);
    var TempContentPemasok = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + 'Pilih Pemasok' +'</div>';
    $("#dropdownPemasok").jqxDropDownButton('setContent', TempContentPemasok);  
    $("#form-barang").attr('action', '<?php echo base_url()?>Master/DoInsertBarang');
    StatusBtnSimpan = 'tambah';    
}

function ModalUbahBarang(e){
   var rowindex = $('#GridBarang').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        $("#barangModal").modal('show');
        $("#form-barang")[0].reset();
        $("#modalBarang-content").find('.modal-title').text('UBAH DATA');
        var row = $("#GridBarang").jqxGrid('getrowdata', rowindex);
        var cols = $("#GridBarang").jqxGrid('columns');
        for(var i = 0; i<cols.records.length;i++){
            var fieldname = cols.records[i].datafield.toString();
            if(row[fieldname] != "" || null){
                $('#'+fieldname).parent().removeClass();
                $('#'+fieldname).parent().addClass('form-line focused');
                $('input[name='+fieldname+']').val(row[fieldname]);

                if(fieldname == 'kode_kategoribarang'){
                    var dtfilter = $.grep(conKategori.loadedData, function(e){return e.kode_kategoribarang === row[fieldname]});
                    var tempcon = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + dtfilter[0]['nama_kategori'] +'</div>';
                    $("#dropdownKategori").jqxDropDownButton('setContent', tempcon);
                    $('input[name=kategori]').val(row[fieldname]);
                }
                else if( fieldname == 'kode_pemasok'){
                    var dtfilter = $.grep(conPemasok.loadedData, function(e){return e.kode_pemasok === row[fieldname]});
                    var tempcon = '<div style="position: relative; margin-left:3px; margin-top: 5px;">' + dtfilter[0]['nama_pemasok']+'</div>';
                    $("#dropdownPemasok").jqxDropDownButton('setContent', tempcon);
                    $('input[name=pemasok]').val(row[fieldname]);
                }
            }
        }
        $("#form-barang").attr('action', '<?php echo base_url()?>Master/DoUpdateBarang/'+ row['kode_barang']);
        StatusBtnSimpan = 'ubah'; 
   } 
}

function HapusBarang(){
    var rowindex = $('#GridBarang').jqxGrid('getselectedrowindex');
   if(rowindex == -1){
         swal('Pilih baris yang akan diubah terlebih dahulu !');
   }else{
        var row = $("#GridBarang").jqxGrid('getrowdata', rowindex);
        var rID = row['kode_barang'];
        swal({
            title: 'Yakin Hapus Data ?',
            text: "Data Tidak Bisa Dikembalikan Jika Sudah Dihapus !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
            }).then(function () {
                alert(rID);
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url() ?>Master/DoDeleteBarang',
                    data : {id : rID},
                    dataType: "json",
                    success: function(response){
                         swal({  title: "Good job!",  text: "Data Barang Berhasil DiHapus !", type: "success", timer: 1000, showConfirmButton: false }); 
                         $('#GridBarang').jqxGrid('updatebounddata');     
                    },
                    error: function(response){
                         swal({ title: "Lapor Admin !", text: "Data Barang Gagal DiHapus ! (error ajax)", type: "error", timer: 2000, showConfirmButton: true });
                    }       
                });
        });
   }
}

function SimpanBarang(){
    var url = $("#form-barang").attr('action');
    var data = $("#form-barang").serialize();
    var statAction = StatusBtnSimpan == 'tambah'  ? 'Ditambahkan' : 'Diubah';
    $("#barangModal").modal('hide');
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            if(response.success){
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
 </script>
