   <!-- Add New Address Modal -->
   <div class="manage-address-modal add-address-modal modal fade" id="addNewAddress" data-bs-backdrop="static"
       data-bs-keyboard="false" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="manage-address-modal-haeder modal-header">
                   <div class="manage-address-modal-title modal-title h4">
                       Add new address
                   </div>
                   <div class="btn-close manage-address-modal-close" data-bs-dismiss="modal" aria-label="Close">
                       <i class="fi-rr-cross-small"></i>
                   </div>
               </div>
               <form action="{{ route('newAddress.store') }}" method="post" id="add-address-form">
                   @csrf
                   <div class="manage-address-modal-body add-address-modal-body modal-body">
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group">
                                   <label>Full name</label>
                                   <input type="text"name="name" placeholder="ex: Jhon Smith" required="" />
                                   <div class="invalid-feedback" role="alert">
                                       @error('name')
                                           {{ $message }}
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group">
                                   <label>Mobile number</label>
                                   <input type="tel" name="phone" placeholder="ex: 01234567890" required="" />
                                   <div class="invalid-feedback" role="alert">
                                       @error('phone')
                                           {{ $message }}
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group">
                                   <label>Address</label>
                                   <input type="text" name="address"
                                       placeholder="ex: House no. / building / street / area" required="" />
                                   <div class="invalid-feedback" role="alert">
                                       @error('address')
                                           {{ $message }}
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group select-style-2">
                                   <label>Select city</label>
                                   <select name="district_id" id="district_id" class="select2"
                                       data-placeholder="Select city" data-allow-clear="true" style="width:100%"
                                       required="">
                                       <option></option>
                                   </select>
                                   <div class="invalid-feedback" role="alert">
                                       @error('district_id')
                                           {{ $message }}
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group select-style-2">
                                   <label>Select Area</label>
                                   <select name="upazila_id" id="upazila_id" class="select2"
                                       data-placeholder="Select area" data-allow-clear="true" style="width:100%"
                                       required="">
                                       <option></option>
                                   </select>
                                   <div class="invalid-feedback" role="alert">
                                       @error('upazila_id')
                                           {{ $message }}
                                       @enderror
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12">
                               <div class="form-group select-style-2">
                                   <label>Set Address for</label>
                                   <div class="set-address">
                                       <div class="single-set-address">
                                           <input type="checkbox" name="shipping_address" id="shipping_address"
                                               value="shipping_address" class="btn-check" autocomplete="off" />
                                           <label class="btn btn-outline-primary" for="shipping_address">
                                               Shipping address
                                           </label>
                                       </div>
                                       <div class="single-set-address">
                                           <input type="checkbox" name="billing_address" id="billing_address"
                                               value="billing_address" class="btn-check" autocomplete="off" />
                                           <label class="btn btn-outline-primary" for="billing_address">
                                               Billing address
                                           </label>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="manage-address-modal-footer"
                       style="border-top: 1px solid var(--border-color);padding-top: 16px;">
                       <button type="button" class="theme-btn" data-bs-dismiss="modal" aria-label="Close">
                           Cancel
                       </button>
                       <button type="submit" class="theme-btn primary">
                           Save address
                       </button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!-- End Add New Address Modal -->
