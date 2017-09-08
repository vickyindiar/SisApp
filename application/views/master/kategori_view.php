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
            var dtKategoriAdapter = new $.jqx.dataAdapter(dtKategori, {
                    autoBind: true
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
                ]
            });



});
</script>