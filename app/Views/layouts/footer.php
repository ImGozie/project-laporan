</main>
<!-- <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="hover:text-[#F4DFC8] border-[3px] focus:bg-black focus:text-[#F4DFC8] border-black duration-150 hover:bg-black font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
    <p>Select Role</p>
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
    </svg>
</button> -->
<!-- <div id="dropdown" class="z-10 hidden rounded-lg shadow w-[140px] bg-gray-800">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Admin</a>
      </li>
    </ul>
</div> -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            ajax: {
                url: '<?= site_url('users/datatable'); ?>',
                type: 'get'
            },
            // language: {
            //     processing: 'DataTables is currently busy'
            // },
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: '!text-center font-semibold'
                },
                {
                    data: 'username'
                },
                {
                    data: 'email'
                },
                {
                    data: 'password'
                },
                {
                    data: 'login_method'
                },
                {
                    data: 'role'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            processing: true,
            serverSide: true,
            order: [
                [5, 'ASC']
            ],
            columnDefs: [{
                targets: [5, 6],
                className: '!text-center'
            }],
        });
        $('#dt-search-0').attr('placeholder', 'Search...');
    });
</script>
</body>

</html>