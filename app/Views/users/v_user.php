<?= $this->include('layouts/header'); ?>
<section class="mt-4">
    <div class="px-4 rounded-lg shadow-md overflow-x-auto max-w-full">
        <div class="flex gap-2 justify-end py-4 border-b-2 border-gray-200">
            <button
                onclick="openModal('Add New User', '<?= site_url('users/form'); ?>')"
                data-modal-target="crud-modal" 
                data-modal-toggle="crud-modal" 
                class="text-[0.8rem] bg-gozi-700 hover:bg-gozi-500 duration-150 text-[#F4DFC8] py-2 px-3 font-[500] rounded-md"
            >
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>
        <table id="usersTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Login Method</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>
<?= $this->include('layouts/footer'); ?>
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