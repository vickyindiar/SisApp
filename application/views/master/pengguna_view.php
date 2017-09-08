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
});

</script>