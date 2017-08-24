<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                TABS WITH ICON TITLE
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
                    <a href="#tab-master-pengguna" data-toggle="tab">
                        <i class="material-icons">person_add</i> PENGGUNA
                    </a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab-master-barang">
                   
                        <div class="btn-group" role="group" aria-label="Default button group" style="margin-bottom:10px">
                          <button type="button" id="btn-tambah-barang" class="btn bg-blue waves-effect" onclick="tambahbarang()"><i class="material-icons">playlist_add</i><span> Tambah</span></button>
                          <button type="button" id="btn-ubah-barang" class="btn bg-green waves-effect"  onclick="ubahbarang()"><i class="material-icons">border_color</i><span> Ubah</span></button>
                          <button type="button" id="btn-hapus-barang" class="btn bg-red waves-effect"  onclick="deletebarang()"><i class="material-icons">delete_forever</i><span> Delete</span></button>
                         </div>
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div id="GridBarang">  </div>
                        </div>
                    </div> 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-master-kategori">
                    <b>Message Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-master-pengguna">
                    <div id="GridPengguna"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(function(){

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
            var btnAction = function(row, datafield, value){
               var data =  $("#GridBarang").jqxGrid('getrowdata', row);
               if(data.nama_barang.toString() == ""){
                return ('<button type="button"  style="width:30%; margin-left:20%" class="btn btn-xs bg-teal waves-effect waves-float" onclick="btnUbahOnClick('+row+')"> <i class="material-icons">save</i></button> <button type="button" style="width:30%" class="btn btn-xs bg-red waves-effect waves-float" onclick="btnHapusBlankRow('+row+')"> <i class="material-icons">delete</i></button>'); 
               }              
            }
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
              sortable: true,
              pageable: true,    
              //autoheight: true,         
              // /columnsresize: true,
              pagermode: 'simple',
              //editable: true,
              selectionmode: 'singlerow',
              //editmode: 'selectedrow',

              columns : [
                {text:'Kode Barang', datafield:'kode_barang', cellsalign:'center', align:'center'/*pinned:'true'*/},
                {text:'Nama Barang', datafield:'nama_barang', cellsalign:'center', align:'center'},
                {text:'Harga Beli', datafield:'harga_beli', cellsalign:'center', align:'center'},
                {text:'Harga Jual', datafield:'harga_jual', cellsalign:'center', align:'center'},
                {text:'Stok', datafield:'stok', cellsalign:'center', align:'center'},
                {text:'Satuan', datafield:'satuan', cellsalign:'center', align:'center'},
                {text:'Kategori', datafield:'kode_kategoribarang', cellsalign:'center', align:'center'},
                {text:'Pemasok', datafield:'kode_pemasok', cellsalign:'center', align:'center'},
                {text:'Action', datafield:'action-tambah', hidden: true, cellsalign:'center', align:'center', cellsrenderer: btnAction},
               // 
                ],
            }); 
    });

function tambahbarang(){
   $("#GridBarang").jqxGrid('addrow',null,{},'first');
   $("#GridBarang").jqxGrid('showcolumn', 'action-tambah');
}

function btnHapusBlankRow(e){
    var id = $('#GridBarang').jqxGrid('getrowid', e);
    $('#GridBarang').jqxGrid('deleterow', id);

    var dtSource = $('#GridBarang').jqxGrid('getrows');
    var emptyrow = $.grep(dtSource, function(e, i){ return e.nama_barang == ""});
    if(emptyrow.length == 0){
        $("#GridBarang").jqxGrid('hidecolumn', 'action-tambah');
    }

}


</script>