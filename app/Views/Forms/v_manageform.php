<?= $this->include('layouts/header'); ?>
<section class="mt-4">
    <div class="p-4 rounded-lg border-2 shadow-[1px_2px_10px_0px_#00000020] overflow-x-auto max-w-full">
        <table id="currentStatusTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tahun lulus</th>
                    <th>No. Telpon</th>
                    <th>Sosial media</th>
                    <th>Jurusan</th>
                    <th>Status saat ini</th>
                    <th>Info kerja dari :</th>
                    <th>Dapat kerja melalui :</th>
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
        tb = $('#currentStatusTable').DataTable({
            ajax: {
                url: '<?= site_url('manageform/datatable'); ?>',
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
                    data: 'nis',
                    className: '!text-center'
                },
                {
                    data: 'fullname'
                },
                {
                    data: 'graduationyear',
                    className: '!text-center'
                },
                {
                    data: 'phonenumb',
                    className: '!text-center'
                },
                {
                    data: 'socialmedia'
                },
                {
                    data: 'majorname',
                    className: '!text-center'
                },
                {
                    data: 'status'
                },
                {
                    data: 'info'
                },
                {
                    data: 'currentjobfrom'
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
            order: [
                [3, 'ASC']
            ],
        });
        
        $('#dt-search-0').attr('placeholder', 'Search...');
    });
</script>