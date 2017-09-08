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
</script>