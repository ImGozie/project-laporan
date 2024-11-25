<!-- Modal body -->
<form id="form-currentstatus" method="post" class="p-2 md:p-3">
    <input type="hidden" name="id" value="<?= $formType == 'edit' ? $id : '' ?>">
    <div class="grid gap-2 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-0.5 text-xs text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Current Status</label>
            <input value="<?= $formType == 'edit' ? $res->status : '' ?>" type="text" name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-[4px] focus:!ring-gozi-400 block w-full p-2.5" placeholder="example: Bekerja" required="">
        </div>
        <div class="col-span-2">
            <label for="name" class="block mb-0.5 text-xs text-gray-800">Desc</label>
            <textarea value="<?= $formType == 'edit' ? $res->desc : '' ?>" name="desc" id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-[4px] focus:!ring-gozi-400 block w-full p-2.5" placeholder="example: Lanjut Bekerja"></textarea>
        </div>
    </div>
    <div class="flex gap-2 justify-end border-t-2 border-gray-200 pt-2 md:pt-3">
        <button class="duration-150 text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-600 rounded-[4px] text-sm px-3 py-2.5 text-center">
            <i class="fa-solid fa-rotate-right fa-lg"></i>
        </button>
        <button type="submit" class="duration-150 text-white inline-flex gap-2 items-center bg-gozi-600 hover:bg-gozi-500 rounded-[4px] text-sm px-5 py-2.5 text-center">
            <i class="fa-solid fa-plus fa-lg"></i>
            <?= $formType == 'edit' ? 'Save Data' : 'Submit Data' ?>
        </button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-currentstatus").on("submit", function(e) {
            e.preventDefault();
            let formType = "<?= $formType ?>";
            let link = "<?= site_url('currentstatus/add') ?>";
            if (formType == "edit") {
                link = "<?= site_url('currentstatus/update') ?>";
            }
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: link,
                data: data,
                dataType: "json",
                success: function(response) {
                    let notifType = response.success ? "success" : "error";
                    // showNotif(notifType, response.message);
                    console.log(notifType, response.message);
                    if (response.success) {
                        closeModal('#crud-modal');
                        tb.ajax.reload();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    showError(thrownError + ", please contact administrator for the further");
                },
            });

            return false;
        });
    });
</script>