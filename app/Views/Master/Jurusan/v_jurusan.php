<?= $this->include('layouts/header'); ?>
<section class="mt-4">
    <div class="px-4 rounded-lg border-2 shadow-[1px_2px_10px_0px_#00000020] overflow-x-auto max-w-full">
        <div class="flex gap-2 justify-end py-4 border-b-2 border-gray-200">
            <button
                onclick="openModal('Add New Major', '<?= site_url('jurusan/form'); ?>')"
                class="text-[0.8rem] bg-gozi-700 hover:bg-gozi-500 duration-150 text-[#F4DFC8] py-2 px-3 font-[500] rounded-md">
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>
        <table id="jurusanTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
        tb = $('#jurusanTable').DataTable({
            ajax: {
                url: '<?= site_url('jurusan/datatable'); ?>',
                type: 'get'
            },
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: '!text-center font-semibold'
                },
                {
                    data: 'majorname'
                },
                {
                    data: 'created_date'
                },
                {
                    data: 'updated_date'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    className: '!text-center'
                },
            ],
            processing: true,
            serverSide: true,
            // order: [
            //     [5, 'ASC']
            // ],
        });
        
        $('#dt-search-0').attr('placeholder', 'Search...');
    });
</script>