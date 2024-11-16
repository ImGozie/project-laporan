<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center !items-start w-full md:inset-0 backdrop-blur-sm h-screen max-h-full">
    <div class="relative p-4 !top-10 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-2 md:p-3 border-b rounded-t">
                <h3 id="modal-title" class="text-md font-medium text-gray-900"></h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Body: Dynamic Content -->
            <div id="modal-body"></div>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
    });
    function openModal(modalTitle, formUrl) {
        $('#modal-title').text(modalTitle);

        $('#modal-body').load(formUrl, function() {
            $('#crud-modal').removeClass('hidden').addClass('flex');
        });
    }
</script>
</body>

</html>