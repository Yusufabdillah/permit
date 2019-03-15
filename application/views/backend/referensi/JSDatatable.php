<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 13:06
 */
?>
<script type="text/javascript">
    $('#server_data').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    // sample GET method
                    method: 'GET',
                    url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 5,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        },

        // layout definition
        layout: {
            theme: 'default', // datatable theme
            class: '', // custom wrapper class
            scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
            // height: 450, // datatable's body's fixed height
            footer: false // display/hide footer
        },

        // column sorting
        sortable: true,

        pagination: true,

        toolbar: {
            // toolbar items
            items: {
                // pagination
                pagination: {
                    // page size select
                    pageSizeSelect: [5, 10, 20, 30, 50, 100],
                },
            },
        },

        search: {
            input: $('#generalSearch'),
            onEnter: true
        },

        columns: [
            {
                field: "idJudul",
                title: 'No',
                width: 40,
                responsive: {visible: 'lg'},
                textAlign: 'center',
                template: function (index) {
                    return index.idJudul;
                }
            },
            {
                field: 'Aksi',
                width: 50,
                title: "&#9997;",
                textAlign: 'center',
                sortable: false,
                overflow: 'visible',
                template: function (row) {
                    var encodeID = function () {
                        var tmp = null;
                        $.ajax({
                            async: false,
                            type: "POST",
                            url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                            data: {
                                'fungsi' : 'encode',
                                'idJudul' : row.idJudul
                            },
                            success: function(data){
                                tmp = data;
                            }
                        });
                        return tmp;
                    }();
                    return '\
                        <a class="m-btn btn btn-secondary m-btn--hover-info" href="<?= site_url($this->router->fetch_class().'/form/'); ?>'+encodeID+'"><i class="la la-edit"></i></a>\
					';
                }
            },
            {
                field: "namaJudul",
                textAlign: 'left',
                width: 500,
                title: "Judul Dokumen"
            }
        ],
    });
</script>
