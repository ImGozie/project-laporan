<?= $this->include('layouts/header'); ?>
<section class="p-4 h-screen overflow-auto">
    <div class="p-4 rounded-lg shadow-md border-gray-300">
        <table id="selection-table">
            <thead>
                <tr>
                    <th class="inline-block">
                        <span class="items-center inline-block">
                            #
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Username
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Email
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Password
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Login Method
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Role
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap">Superuser</td>
                    <td>Tenhag@gmail.com</td>
                    <td>pass world</td>
                    <td>Local</td>
                    <td>Admin</td>
                    <td>$3.04T</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap">Admin</td>
                    <td>Tenhug@gmail.com</td>
                    <td>pass world</td>
                    <td>Local</td>
                    <td>Admin</td>
                    <td>$3.04T</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<?= $this->include('layouts/footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
<script>
    if (document.getElementById("selection-table") && typeof simpleDatatables.DataTable !== 'undefined') {

        let multiSelect = true;
        let rowNavigation = false;
        let table = null;

        const resetTable = function() {
            if (table) {
                table.destroy();
            }

            const options = {
                rowRender: (row, tr, _index) => {
                    if (!tr.attributes) {
                        tr.attributes = {};
                    }
                    if (!tr.attributes.class) {
                        tr.attributes.class = "";
                    }
                    if (row.selected) {
                        tr.attributes.class += " selected";
                    } else {
                        tr.attributes.class = tr.attributes.class.replace(" selected", "");
                    }
                    return tr;
                }
            };
            if (rowNavigation) {
                options.rowNavigation = true;
                options.tabIndex = 1;
            }

            table = new simpleDatatables.DataTable("#selection-table", options);

            // Mark all rows as unselected
            table.data.data.forEach(data => {
                data.selected = false;
            });

            table.on("datatable.selectrow", (rowIndex, event) => {
                event.preventDefault();
                const row = table.data.data[rowIndex];
                if (row.selected) {
                    row.selected = false;
                } else {
                    if (!multiSelect) {
                        table.data.data.forEach(data => {
                            data.selected = false;
                        });
                    }
                    row.selected = true;
                }
                table.update();
            });
        };

        // Row navigation makes no sense on mobile, so we deactivate it and hide the checkbox.
        const isMobile = window.matchMedia("(any-pointer:coarse)").matches;
        if (isMobile) {
            rowNavigation = false;
        }

        resetTable();
    }

    // $(document).ready(function() {
    //     $('#usersTable').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "responsive": true,
    //         "order": [
    //             [1, 'asc']
    //         ],
    //         "ajax": {
    //             "url": "<?= site_url('users/datatable') ?>",
    //             "type": "GET"
    //         },
    //         "columns": [{
    //                 "data": 0
    //             },
    //             {
    //                 "data": 1
    //             },
    //             {
    //                 "data": 2
    //             },
    //             {
    //                 "data": 3
    //             },
    //             {
    //                 "data": 4
    //             }
    //         ],
    //         "columnDefs": [{
    //             "orderable": false,
    //             "targets": [2, 3, 4]
    //         }]
    //     });
    // });
</script>