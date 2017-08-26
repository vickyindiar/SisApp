<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                DATA MASTER
            </h2>
        </div>
        <div class="body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab-master-barang" data-toggle="tab">
                        <i class="material-icons">playlist_add</i> BARANG
                    </a>
                </li>
                <li role="presentation">
                    <a href="#tab-master-kategori" data-toggle="tab">
                        <i class="material-icons">add_to_queue</i> KATEGORI
                    </a>
                </li>
                <li role="presentation">
                    <a href="#tab-master-pemasok" data-toggle="tab">
                        <i class="material-icons">person_pin</i> PEMASOK
                    </a>
                </li>
                <li role="presentation">
                    <a href="#tab-master-pengguna" data-toggle="tab">
                        <i class="material-icons">person_add</i> PENGGUNA
                    </a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab-master-barang">                  
                    <div class="btn-group" role="group" aria-label="Default button group" style="margin-bottom:10px">
                        <button type="button" id="btn-tambah-barang" class="btn bg-blue waves-effect" onclick="btnTambah('GridBarang')"><i class="material-icons">playlist_add</i><span> Tambah</span></button>
                        <button type="button" id="btn-ubah-barang" class="btn bg-green waves-effect"  onclick="btnUbah('GridBarang')"><i class="material-icons">border_color</i><span> Ubah</span></button>
                        <button type="button" id="btn-hapus-barang" class="btn bg-red waves-effect"  onclick="btnHapus('GridBarang')"><i class="material-icons">delete_forever</i><span> Hapus</span></button>
                    </div> 
                    <div class="btn-group" role="group" aria-label="Default button group" style="float:right" id="btn-group-simpan">   
                     <button type="button" id="btn-simpan-barang" style="float: right" class="btn bg-red waves-effect" onclick="btnSimpan('GridBarang')"><i class="material-icons">save</i><span> Simpan</span></button>  
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="GridBarang">  </div>
                            <form Method="POST" hidden>
                                <input type="text" id="kode_barang" name="kode_barang" class="form-control"> 
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                                <input type="number" id="harga_beli" name="harga_beli" class="form-control">  
                                <input type="number" id="harga_jual" name="harga_jual" class="form-control"> 
                                <input type="number" id="stok" name="stok" class="form-control">
                                <input type="text" id="satuan" name="satuan" class="form-control">
                                <input type="hidden" name="kategori" hidden>
                                <input type="hidden" name="pemasok">  
                            </form>
                        </div>
                    </div> 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-master-kategori">
                    <div class="btn-group" role="group" aria-label="Default button group" style="margin-bottom:10px">
                        <button type="button" id="btn-tambah-kategori" class="btn bg-blue waves-effect" onclick="btnTambah('GridKategori')"><i class="material-icons">playlist_add</i><span> Tambah</span></button>
                        <button type="button" id="btn-ubah-kategori" class="btn bg-green waves-effect"  onclick="btnUbah('GridKategori')"><i class="material-icons">border_color</i><span> Ubah</span></button>
                        <button type="button" id="btn-hapus-kategori" class="btn bg-red waves-effect"  onclick="btnHapus('GridKategori')"><i class="material-icons">delete_forever</i><span> Hapus</span></button>
                    </div>       
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="GridKategori">  </div>
                        </div>
                    </div> 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-master-pemasok">
                    <div class="btn-group" role="group" aria-label="Default button group" style="margin-bottom:10px">
                        <button type="button" id="btn-tambah-pemasok" class="btn bg-blue waves-effect" onclick="btnTambah('GridPemasok')"><i class="material-icons">playlist_add</i><span> Tambah</span></button>
                        <button type="button" id="btn-ubah-pemasok" class="btn bg-green waves-effect"  onclick="btnUbah('GridPemasok')"><i class="material-icons">border_color</i><span> Ubah</span></button>
                        <button type="button" id="btn-hapus-pemasok" class="btn bg-red waves-effect"  onclick="btnHapus('GridPemasok')"><i class="material-icons">delete_forever</i><span> Hapus</span></button>
                    </div>       
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="GridPemasok">  </div>
                        </div>
                    </div> 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-master-pengguna">
                    <div class="btn-group" role="group" aria-label="Default button group" style="margin-bottom:10px">
                        <button type="button" id="btn-tambah-pengguna" class="btn bg-blue waves-effect" onclick="btnTambah('GridPengguna')"><i class="material-icons">playlist_add</i><span> Tambah</span></button>
                        <button type="button" id="btn-ubah-pengguna" class="btn bg-green waves-effect"  onclick="btnUbah('GridPengguna')"><i class="material-icons">border_color</i><span> Ubah</span></button>
                        <button type="button" id="btn-hapus-pengguna" class="btn bg-red waves-effect"  onclick="deletebarang('GridPengguna')"><i class="material-icons">delete_forever</i><span> Hapus</span></button>
                    </div>       
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="GridPengguna"></div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(function(){
            $('#btn-group-simpan').hide();
            var btnActionTambah = function(row, datafield, value, element, properti, record){
                var selector =  properti.classname;
                var data =  $("#"+selector).jqxGrid('getrowdata', row);
                if(selector == 'GridBarang'){
                    if(data.nama_barang.toString() == ""){
                        return ('<button type="button"  style="width:30%; margin-left:35%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusBlankRow('+row+','+selector+')"> <i class="material-icons">delete</i></button>'); 
                    } 
                }else if(selector == 'GridKategori'){
                    if(data.nama_kategori.toString() == ""){
                        return ('<button type="button" style="width:30%; margin-left:35%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusBlankRow('+row+','+selector+')"> <i class="material-icons">delete</i></button>'); 
                    }    
                }else if(selector == 'GridPemasok'){
                    if(data.nama_pemasok.toString() == ""){
                        return ('<button type="button" style="width:30%; margin-left:35%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusBlankRow('+row+','+selector+')"> <i class="material-icons">delete</i></button>'); 
                    }            
                }else if(selector == 'GridPengguna'){
                    if(data.nama_pengguna.toString() == ""){
                        return ('<button type="button" style="width:30%; margin-left:35%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusBlankRow('+row+','+selector+')"> <i class="material-icons">delete</i></button>'); 
                    } 
                }    
            }

            var callUser = {
                datatype: "json",
                datafield:[
                    {name:"iduser"},
                    {name:"username"},
                    {name:"password"},
                    {nama:"level"}
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
                {text:'Kode Pengguna', datafield:'iduser', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Pengguna', datafield:'username', cellsalign:'center', align:'center'},
                {text:'Password', datafield:'password', cellsalign:'center', align:'center'},
                {text:'Level User', datafield:'level', cellsalign:'center', align:'center'},
                {text:'Action', datafield:'action-tambah', hidden: true, cellsalign:'center', classname: 'GridPengguna', align:'center',  cellsrenderer: btnActionTambah},
                ]
            });
            
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
              },
            }
            var dtBarangAdapter = new $.jqx.dataAdapter(dtBarang); 

            var rowEdit = function(row, datafield, columntyp, cellvalue) {
                var result;
                if(StatusBtnTambah > 0){
                    if (cellvalue != "" || datafield == 'action-tambah') {
                        result = false;
                        if(cellvalue == null && datafield != 'action-tambah'){
                             result = true;
                        }
                    }
                }
                return result;
            };

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
              editmode: 'dbclick',
              columns : [
                {text:'Kode Barang', datafield:'kode_barang', cellsalign:'center', align:'center', cellbeginedit: rowEdit/*pinned:'true'*/},
                {text:'Nama Barang', datafield:'nama_barang', cellsalign:'center', align:'center', cellbeginedit: rowEdit},
                {text:'Harga Beli', datafield:'harga_beli', cellsalign:'center', align:'center', cellbeginedit: rowEdit},
                {text:'Harga Jual', datafield:'harga_jual', cellsalign:'center', align:'center', cellbeginedit: rowEdit},
                {text:'Stok', datafield:'stok', cellsalign:'center', align:'center', cellbeginedit: rowEdit},
                {text:'Satuan', datafield:'satuan', cellsalign:'center', align:'center', cellbeginedit: rowEdit},
                {text:'Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center', cellbeginedit: rowEdit, columntype: 'combobox',
                    createeditor: function (row, column, editor) {
                            var list = [];
                            var data = dtKategoriAdapter;
                            for(var i=0; i<data.records.length; i++){
                                list.push(data.records[i].nama_kategori);
                            }
                            editor.jqxComboBox({ autoDropDownHeight: true, source: list, promptText: "Please Choose:" });
                    },
                    cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                            if (newvalue == "") return oldvalue;
                    }                
                },
                {text:'Pemasok', datafield:'kode_pemasok', cellsalign:'center', align:'center', cellbeginedit: rowEdit, columntype: 'combobox',
                    createeditor: function (row, column, editor) {
                            var list = [];
                            var data = dtPemasok;
                            for(var i=0; i<data.records.length; i++){
                                list.push(data.records[i].nama_pemasok);
                            }
                            editor.jqxComboBox({ autoDropDownHeight: true, source: list, promptText: "Please Choose:" });
                    },
                    cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                            if (newvalue == "") return oldvalue;
                    }  
                },
                {text:'Action', datafield:'action-tambah', hidden: true, cellsalign:'center', align:'center', cellbeginedit: rowEdit, classname: 'GridBarang', cellsrenderer: btnActionTambah},
               // 
                ],
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
                {text:'Action', datafield:'action-tambah', hidden: true, cellsalign:'center', classname: 'GridKategori', align:'center',  cellsrenderer: btnActionTambah},
                ]
            });

            var getPemasok= 
            {
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
                {text:'Action', datafield:'action-tambah', hidden: true, cellsalign:'center', classname: 'GridKategori', align:'center',  cellsrenderer: btnActionTambah},
                ]
            });
    });
var StatusBtnTambah = 0;
var StatusBtnUbah = false;

function btnTambah(selector){
    if(StatusBtnUbah){

    }else{
        $("#"+selector).jqxGrid('addrow',null,{}, 'first');
        $("#"+selector).jqxGrid('showcolumn', 'action-tambah');
        $("#"+selector).jqxGrid({editable : true});
        $('#btn-group-simpan').show(500);
        StatusBtnTambah += 1;
    }
}

function btnUbah(selector){
    $("#"+selector).jqxGrid({editable : true});
}

function btnSimpan(selector){
    if(StatusBtnTambah > 0 ){

    }
}

function btnHapusBlankRow(e, selector){
    var id = $('#'+selector.id).jqxGrid('getrowid', e);
    $('#'+selector.id).jqxGrid('deleterow', id);
    StatusBtnTambah -= 1;
    var dtSource = $('#'+selector.id).jqxGrid('getrows');
    if(selector.id == 'GridBarang'){var emptyrow = $.grep(dtSource, function(e, i){ return e.nama_barang == ""});} 
    else if(selector.id == 'GridPengguna'){var emptyrow = $.grep(dtSource, function(e, i){ return e.username == ""});}
    else if(selector.id == 'GridKategori'){var emptyrow = $.grep(dtSource, function(e, i){ return e.nama_kategori == ""});}
    else if(selector.id == 'GridPemasok'){var emptyrow = $.grep(dtSource, function(e, i){ return e.nama_pemasok == ""});}
    if(emptyrow.length == 0){
        $("#"+selector.id).jqxGrid('hidecolumn', 'action-tambah');
        $('#btn-group-simpan').hide(500);
    }
}


</script>