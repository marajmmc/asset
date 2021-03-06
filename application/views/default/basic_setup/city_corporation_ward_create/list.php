<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI=& get_instance();
?>
<div id="system_content" class="system_content_margin">
    <div id="system_action_button_container" class="system_action_button_container">
        <?php
        $CI->load_view('system_action_buttons');
        ?>
    </div>
    <div id="system_dataTable">
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function ()
    {
        turn_off_triggers();
        var url = "<?php echo $CI->get_encoded_url('basic_setup/city_corporation_ward_create/get_list');?>";

        // prepare the data
        var source =
        {
            dataType: "json",
            dataFields: [
                { name: 'id', type: 'int' },
                { name: 'edit_link', type: 'string' },
                { name: 'wardname', type: 'string' },
                { name: 'citycorporationname', type: 'string' },
                { name: 'zillaname', type: 'string' },
                { name: 'divname', type: 'string' },
                { name: 'status_text', type: 'string' }
            ],
            id: 'id',
            url: url
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        $("#system_dataTable").jqxGrid(
            {
                width: '100%',
                source: dataAdapter,
                pageable: true,
                filterable: true,
                sortable: true,
                showfilterrow: true,
                columnsresize: true,
                pagesize:10,
                pagesizeoptions: ['10', '20', '30', '50','100','150'],
                selectionmode: 'checkbox',
                altrows: true,
                autoheight: true,

                columns: [
                    { text: '<?php echo $CI->lang->line('CITY_CORPORATION_WARD_NAME_BN'); ?>', dataField: 'wardname', width:'20%'},
                    { text: '<?php echo $CI->lang->line('CITY_CORPORATION_NAME_BN'); ?>', filtertype: 'checkedlist', dataField: 'citycorporationname', width:'30%'},
                    { text: '<?php echo $CI->lang->line('ZILLA_NAME_BN'); ?>', filtertype: 'checkedlist', dataField: 'zillaname', width:'20%'},
                    { text: '<?php echo $CI->lang->line('DIVISION_NAME_BN'); ?>', dataField: 'divname', filtertype: 'checkedlist', width:'20%'},
                    { text: '<?php echo $CI->lang->line('STATUS'); ?>', dataField: 'status_text',filtertype: 'checkedlist', width:'8%'}
                ]
            });
        //for Double Click to edit
        <?php
            if($CI->permissions['edit'])
            {
                ?>
            $('#system_dataTable').on('rowDoubleClick', function (event)
            {

                var edit_link=$('#system_dataTable').jqxGrid('getrows')[event.args.rowindex].edit_link;

                $.ajax({
                    url: edit_link,
                    type: 'POST',
                    dataType: "JSON",
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            });
            <?php
        }
    ?>
    });
</script>