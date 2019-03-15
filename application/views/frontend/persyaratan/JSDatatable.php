<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 13:06
 */
?>
<script type="text/javascript">
    $('.m-datatable').mDatatable({
        data: {
            saveState: {cookie: false},
        },
        search: {
            input: $('#generalSearch'),
        },
        columns: [
            {
                field: 'Deposit Paid',
                type: 'number',
            },
            {
                field: 'Order Date',
                type: 'date',
                format: 'YYYY-MM-DD',
            },
        ],
    });
</script>
