<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="Modal Edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-update" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName" required >
                </div>
                <div class="mb-3">
                    <label for="inputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" required >
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" required >
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="inputPhone" required >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
