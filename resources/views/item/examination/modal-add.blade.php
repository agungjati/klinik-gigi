<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="Modal Edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-add" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" required >
                </div>
                <div class="mb-3 d-flex">
                    <div class='me-1' style="flex: 1" >
                        <label for="inputPrice" class="form-label">Price</label>
                        <div class='input-group'>
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="number" class="form-control" id="inputPrice" required >
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputCategory" class="form-label">Category</label>
                    <input type="text" class="form-control" id="inputCategory" required >
                </div>
                <div class="mb-3">
                    <label for="inputDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="inputDescription" required ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
