</main>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            ajax: {
                url: '<?= site_url('users/datatable'); ?>',
                type: 'get'
            },
            // language: {
            //     processing: 'DataTables is currently busy'
            // },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: '!text-center font-semibold'
                },
                { data: 'username' },
                { data: 'email' },
                { data: 'password' },
                { data: 'login_method' },
                { data: 'role' },
                { data: 'action', orderable: false, searchable: false },
            ],
            processing: true,
            serverSide: true,
            order: [[5, 'ASC']],
            // columnDefs: [
            //     { targets: 0, className: '!text-center font-semibold' }
            // ],
            });
        $('#dt-search-0').attr('placeholder', 'Search...');
    });
</script>
</body>

</html>