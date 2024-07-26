<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="Modal Edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-add" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 position-relative autocomplete-doctor">
                    <label for="inputDoctor" class="form-label">Doctor</label>
                    <input type="text" class="form-control" id="inputDoctor" name="inputDoctor" placeholder="Type to search" required />
                    <input type="hidden" id="inputUserId" name="inputUserId" />
                    <div id="list-doctor" class="list-doctor w-100 bg-white outline-none flex-column align-items-start shadow-sm px-2 py-1 position-absolute" style="display: none" >
                        <!-- <button type="button" class="border-0 w-100 text-start d-block p-2 bg-white"> Doctor 1</button>
                        <button type="button" class="border-0 w-100 text-start d-block p-2 bg-white border-top"> Doctor 1</button> -->
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="me-2" style="flex: 1" >
                        <label for="inputStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="inputStartDate" name="inputStartDate" required />
                        <input type="time" class="form-control mt-2" style="width: 120px; margin-left: auto;" id="inputStartTime" name="inputStartTime" required />
                    </div>
                    <div class="border-start ps-2" style="flex: 1" >
                        <label for="inputEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="inputEndDate" name="inputEndDate" required />
                        <input type="time" class="form-control mt-2" style="width: 120px; margin-left: auto;" id="inputEndTime" name="inputEndTime" required />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<style>
    .autocomplete-doctor button:focus,
    .autocomplete-doctor button:hover {
    outline: none;
    background-color: #a7b3ef1a !important;
}
</style>