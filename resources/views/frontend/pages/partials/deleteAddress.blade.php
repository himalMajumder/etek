<!-- Delete Address Modal -->
<div class="delete-address-modal manage-address-modal add-address-modal modal fade" id="deleteAddressModal"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="manage-address-modal-haeder modal-header">
                <div class="btn-close manage-address-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-rr-cross-small"></i>
                </div>
            </div>
            <form action="#" method="post" id="destroy-address-form">
                @method('delete')
                <div class="manage-address-modal-body add-address-modal-body modal-body">
                    <h3>Are you want to Delete Address?</h3>
                </div>
                <div class="manage-address-modal-footer"
                    style="border-top: 1px solid var(--border-color);padding-top: 16px;">
                    <button type="button" class="theme-btn" data-bs-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="theme-btn primary">
                        Delete address
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Address Modal -->
