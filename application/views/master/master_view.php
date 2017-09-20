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
            <div class="tab-content" id="tab-master">
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
                            <div style="font-size: 13px; margin-top: 20px; font-family: Verdana, Geneva, DejaVu Sans, sans-serif;" id="eventLog"></div>
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
                        <button type="button" id="btn-hapus-pengguna" class="btn bg-red waves-effect"  onclick="btnHapus('GridPengguna')"><i class="material-icons">delete_forever</i><span> Hapus</span></button>
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
<?php echo $barang_view; ?>
<?php echo $kategori_view; ?>
<?php echo $pemasok_view; ?>
<?php echo $pengguna_view; ?>


<script>
var StatusBtnSimpan;
var conKategori, conPemasok;
 $(function(){ $('#btn-group-simpan').hide(); });
function SetintJson(objects){
    for(var i = 0; i < objects.length; i++){
        var obj = objects[i];
        for(var prop in obj){
            if(obj.hasOwnProperty(prop) && !isNaN(obj[prop])){
                obj[prop] = +obj[prop];   
            }
        }
        return objects;
    }
}

function getTabIndex(){
 var tab = $('#tab-master'), active = tab.find('.tab-pane.active'), id = active.attr("id");
 if(id.indexOf('barang') > -1) return 0;
 else if(id.indexOf('kategori') > -1) return 1;
 else if(id.indexOf('pemasok') > -1) return 2;
 else if(id.indexOf('pengguna') > -1) return 3;
}


function btnTambah(selector){  
    var tabActive = getTabIndex();
    if(tabActive == 0){  ModalTambahBarang(); }
    else if(tabAvtive == 1){  ModalTambahKategori(); }
    else if(tabAvtive == 2){  ModalTambahPemasok();  }
    else { ModalTambahPengguna();}
}

function btnUbah(selector){
    var tabActive = getTabIndex();
    if(tabActive == 0){ ModalUbahBarang(); }
    else if(tabAvtive == 1){  ModalUbahKategori(); }
    else if(tabAvtive == 2){  ModalUbahPemasok();  }
    else { ModalUbahPengguna();}
}

function btnHapus(selector){
    var tabActive = getTabIndex();
    if(tabActive == 0){ HapusBarang();}
    else if(tabAvtive == 1){  HapusKategori(); }
    else if(tabAvtive == 2){  HapusPemasok();  }
    else { HapusPengguna();}
}

function btnSimpan(selector){
    var tabActive = getTabIndex();
    if(tabActive == 0){ SimpanBarang(); }
    else if(tabAvtive == 1){  SimpanKategori(); }
    else if(tabAvtive == 2){  SimpanPemasok();  }
    else { SimpanPengguna();}
}

</script>