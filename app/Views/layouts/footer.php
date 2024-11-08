    </main>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#usersTable').DataTable({
                ajax: {
                    url: '<?= site_url('users/datatable'); ?>',
                    type: 'get'
                },
                columns: [
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'username' },
                    { data: 'email' },
                    { data: 'password' },
                    { data: 'login_method' },
                    { data: 'role' }
                ],
                processing: true,
                serverSide: true
            });
            $('#dt-search-0').attr('placeholder', 'Search...');
        });
    </script>
</body>
</html>
