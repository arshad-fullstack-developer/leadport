<style>
   html body {
   background: #F5F7FA;
   }
</style>
<form class="w-100 ticket-compose" method="post" id="ticket-compose" data-url="<?php echo e(url('ctickets/store')); ?>">
   <div class="row mt-3 bg-white p-3">
      <div class="col-sm-4 col-lg-3">
         <label for="temp" class="form-label fw-bold">Load Type</label>
         <?php if(isset($loadType)): ?> 
         <select id="inputState" class="form-control" name="ticket_loadtype_id">
            <?php $__currentLoopData = $loadType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($load['id']); ?>"><?php echo e($load['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
         <?php endif; ?> 
      </div>
      <div class="col-sm-4 col-lg-3">
         <label for="quantity" class="form-label fw-bold">Quantity</label>
         <input type="text" class="form-control" name="quantity" placeholder="Type Quantity here" aria-label="quantity">
      </div>
      <div class="col-sm-4 col-lg-3">
         <label for="adr" class="form-label fw-bold">Type</label>
         <?php if(isset($carriageType)): ?> 
         <select id="inputState" class="form-control" name="ticket_type_id">
            <?php $__currentLoopData = $carriageType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carriage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($carriage['id']); ?>"><?php echo e($carriage['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
         <?php endif; ?>
      </div>
      <div class="col-sm-4 col-lg-3">
         <label for="code" class="form-label fw-bold">Incoterms</label>
         <?php if(isset($incoterms)): ?> 
         <select id="inputState" class="form-control" name="ticket_incoterms_id">
            <?php $__currentLoopData = $incoterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($term['id']); ?>"><?php echo e($term['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
         <?php endif; ?>                  
      </div>
   </div>
   <!-- form row two -->
   <div class="row mt-3 bg-white p-3">
      <div class=" col-sm-12 col-lg-6">
         <h5><i class="bi bi-backpack-fill"></i>Shipper</h5>
         <div class="row mt-3" >
            <div class="col">
               <label for="shipper_date"  class="form-label fw-bold">Date</label>
               <input type="date" class="form-control pickadate" id="shipper_date" name="shipping_date" placeholder="Date" aria-label="date">
            </div>
            <div class="col">
               <label for="id" class="form-label fw-bold">Time</label>
               <input type="time" class="form-control" name="shipping_time" placeholder="Id" aria-label="time">
            </div>
         </div>
         <div class="row mt-3" >
            <div class="col-12">
               <label for="shipper" class="form-label fw-bold">Shipper</label>
               <input type="text" class="form-control" placeholder="Add Shipper" name="shipper_name" aria-label="shipper">
            </div>
         </div>
         <div class="row mt-3" >
            <div class="col">
               <label for="country" class="form-label fw-bold">Country </label>
               <?php if(isset($countries) && count($countries) > 0): ?>
               <select class="form-control" name="shipping_country_id">
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($country['id']); ?>"><?php echo e($country['name']); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
               <?php endif; ?>                     
            </div>
            <div class="col">
               <label for="City" class="form-label fw-bold">City</label>
               <input type="text" class="form-control" placeholder="City" name="shipping_city" aria-label="City" onkeypress="initAutocomplete('pickup_city')" id="pickup_city">
            </div>
            <div class="col-sm-12 col-lg-6">
               <label for="country" class="form-label fw-bold">Index </label>
               <input type="text" class="form-control" placeholder="Add index" name="shipping_index" aria-label="country">
            </div>
            <div class="col-12 mt-3">
               <label for="Address" class="form-label fw-bold">Address </label>
               <input type="text" class="form-control" placeholder="Address" name="shipping_address" aria-label="Address" onkeypress="initAutocomplete('pickup_address')" id="pickup_address">
               <input type="hidden" name="origin" id="origin">
            </div>
            <div id="pickup-container" class="col-12 mt-2 pickup">
               <i class="mdi mdi-plus-circle-outline text-success font-28" onclick="addPickupField('pickupRemarks')"></i>
               <br>
               <label for="Pickup Remark" class="form-label fw-bold">Pickup Remark</label>
               <div id="pickupRemarks">
                  <!-- Existing delivery field -->
                  <div class="pickupRemarks">
                     <input type="text" class="form-control pickup" name="pickupRemarks[0]" placeholder="pickupRemarks" aria-label="Pickup Remark">
                     <i class="sl-icon-trash custom" onclick="removeField(this)"></i>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="toggle-outer">
                  <div class="toggle-inner">
                     <input type="checkbox" id="toggle" name="def_shipping">
                  </div>
               </div>
               <label id="toggleLabel toggleLabel1" for="toggle">
               Different pickup
               </label>
               <div id="result">
                  <div class="row mt-3" >
                     <div class="col-12">
                        <label for="alt_shipper" class="form-label fw-bold">Shipper</label>
                        <input type="text" class="form-control" placeholder="Add Shipper" name="def_shipper_name" aria-label="alt_shipper">
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col">
                        <label for="country" class="form-label fw-bold">Country</label>
                        <?php if(isset($countries) && count($countries) > 0): ?>
                        <select class="form-control" name="def_shipping_country_id">
                           <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($country['id']); ?>"><?php echo e($country['name']); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>  
                     </div>
                     <div class="col">
                        <label for="City" class="form-label fw-bold">City</label>
                        <input type="text" class="form-control" name="def_shipping_city" placeholder="City" aria-label="City" onkeypress="initAutocomplete('dif_pickup_city')" id="dif_pickup_city">
                     </div>
                     <div class="col-sm-12 col-lg-6">
                        <label for="index" class="form-label fw-bold">Index </label>
                        <input type="text" class="form-control" name="def_shipping_index" placeholder="Add index" aria-label="index">
                     </div>
                  </div>
                  <div class="mt-3">
                     <label for="Address" class="form-label fw-bold">Address </label>
                     <input type="text" class="form-control" name="def_shipping_address" placeholder="Address" aria-label="Address" onkeypress="initAutocomplete('dif_pickup_address')" id="dif_pickup_address">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- form row three -->
      <div class="col-sm-12 col-lg-6">
         <h5><i class="bi bi-geo-alt-fill"></i> Consignee </h5>
         <div class="row mt-3" >
            <div class="col">
               <label for="consignee_date" class="form-label fw-bold">Date</label>
               <input type="date" class="form-control pickadate" id="consignee_date" name="delivery_date" placeholder="Date" aria-label="date">
            </div>
            <div class="col">
               <label for="id" class="form-label fw-bold">Time</label>
               <input type="time" class="form-control" placeholder="Id" name="delivery_time" aria-label="time">
            </div>
         </div>
         <div class="row mt-3" >
            <div class="col">
               <label for="consignee" class="form-label fw-bold">Consignee</label>
               <input type="text" class="form-control" placeholder="Add Consignee" name="consignee_name" aria-label="consignee">
            </div>
            <div class="row mt-3">
               <div class="col">
                  <label for="country" class="form-label fw-bold">Country</label>
                  <?php if(isset($countries) && count($countries) > 0): ?>
                  <select class="form-control" name="delivery_country_id">
                     <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($country['id']); ?>"><?php echo e($country['name']); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php endif; ?>               
               </div>
               <div class="col">
                  <label for="City" class="form-label fw-bold">City</label>
                  <input type="text" class="form-control" placeholder="City" name="delivery_city" aria-label="City" onkeypress="initAutocomplete('delivery')" id="delivery">
               </div>
               <div class="col-sm-12 col-lg-6">
                  <label for="country" class="form-label fw-bold">Index</label>
                  <input type="text" class="form-control" placeholder="Add index" name="delivery_index" aria-label="country">
               </div>
               <div class="col-12 mt-3">
                  <label for="Address" class="form-label fw-bold">Address</label>
                  <input type="text" class="form-control" placeholder="Address" name="delivery_address" aria-label="Address" onkeypress="initAutocomplete('delivery_address')" id="delivery_address">
                  <input type="hidden" name="destination" id="destination">
               </div>
               <div id="delivery-container" class="col-12 mt-2 delivery">
                  <i class="mdi mdi-plus-circle-outline text-success font-28" onclick="addRemarksField('deliveryRemarks')"></i>
                  <br>
                  <label for="Delivery Remark" class="form-label fw-bold">Delivery Remark</label>
                  <div id="deliveryRemarks">
                     <!-- Existing delivery field -->
                     <div class="deliveryRemarks">
                        <input type="text" class="form-control delivery" name="deliveryRemarks[0]" placeholder="deliveryRemarks" aria-label="Delivery Remark">
                        <i class="sl-icon-trash custom" onclick="removeField(this)"></i>
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="toggle-outer2">
                     <div class="toggle-inner">
                        <input type="checkbox" id="toggle2" name="def_delivery">
                     </div>
                  </div>
                  <label id="toggleLabel toggleLabel2" for="toggle">
                  Different Delivery
                  </label>
                  <div id="result2">
                     <div class="row mt-3" >
                        <div class="col-12">
                           <label for="alt_delivery" class="form-label fw-bold">Delivery</label>
                           <input type="text" class="form-control" placeholder="Add Delivery" name="def_delivery_name" aria-label="alt_delivery">
                        </div>
                     </div>
                     <div class="row mt-3" >
                        <div class="col">
                           <label for="country" class="form-label fw-bold">Country </label>
                           <?php if(isset($countries) && count($countries) > 0): ?>
                           <select class="form-control" name="def_delivery_country_id">
                              <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($country['id']); ?>"><?php echo e($country['name']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php endif; ?> 
                        </div>
                        <div class="col">
                           <label for="City" class="form-label fw-bold">City</label>
                           <input type="text" class="form-control" placeholder="City" name="def_delivery_city" aria-label="City" onkeypress="initAutocomplete('dif_delivery')" id="dif_delivery">
                        </div>
                        <div class="col-sm-12 col-lg-6">
                           <label for="index" class="form-label fw-bold">Index </label>
                           <input type="text" class="form-control" placeholder="Add index" name="def_delivery_index" aria-label="index">
                        </div>
                     </div>
                     <div class="mt-3">
                        <label for="Address" class="form-label fw-bold">Address </label>
                        <input type="text" class="form-control" placeholder="Address" name="def_delivery_address" aria-label="Address">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- form row four -->
   <div class="row mt-3 bg-white p-3">
      <div class="col-sm-4 col-lg-2">
         <label for="temp" class="form-label fw-bold">Temp Sensitive</label>
         <input type="text" class="form-control" name="temp_sensitive" placeholder="Type sensitive here" aria-label="temp">
      </div>
      <div class="col-sm-4 col-lg-2">
         <label for="range" class="form-label fw-bold">Temp Range</label>
         <input type="text" class="form-control" name="temp_range" placeholder="Type Range here" aria-label="range">
      </div>
      <div class="col-sm-4 col-lg-2">
         <label for="adr" class="form-label fw-bold">ADR</label>
         <input type="text" class="form-control" name="adr" placeholder="Type ADR here" aria-label="adr">
      </div>
      <div class="col-sm-4 col-lg-2">
         <label for="code" class="form-label fw-bold">UN Code</label>
         <input type="text" class="form-control" name="un_code" placeholder="Type UN code here" aria-label="code">
      </div>
      <div class="col-sm-4 col-lg-2">
         <label for="fragile" class="form-label fw-bold">Fragile</label>
         <input type="text" class="form-control" name="fragile" placeholder="Type Fragile here" aria-label="fragile">
      </div>
      <div class="col-sm-4 col-lg-2">
         <label for="notes" class="form-label fw-bold">Notes</label>
         <input type="text" class="form-control" name="notes" placeholder="About Notes" aria-label="notes">
      </div>
      <?php echo $__env->make('pages.customticket.components.misc.goods', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   <div class="row mt-3 bg-white p-3">
      <label for="notes" class="form-label fw-bold">Chargeable Weight Total</label>
      &nbsp;&nbsp;
      <input type="number" class="form-control" name="chargeable_weight_total" placeholder="Chargeable Weight Total" aria-label="notes" id="ChargeableWeightTotal">
   </div>
   <div class="text-lg-right">
      <input type="hidden" name="uniqueId" value="<?php echo e(request('share_id')); ?>">
      <button type="submit" class="btn btn-rounded-x btn-success m-t-20"><?php echo e(cleanLang(__('lang.submit_ticket'))); ?></button>
   </div>
</form>

<script>
    $(document).ready(function() {
        $('#ticket-compose').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = $(this).serialize(); // Serialize form data

            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
                url: $(this).data('url'), // Use the data-url attribute
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success
                    $('#ticket-compose input, #ticket-compose select').prop('disabled', true).prop('readonly', true);
                    $('#ticket-compose button[type="submit"]').remove();
                    // Remove all trash icons
                    $('.sl-icon-trash').remove();
                    $('#ticket-compose i.mdi.mdi-plus-circle-outline').remove(); // Only removes icons in the form
                    $('#ticket-compose i.addgoods').remove(); // Remove addgoods icons
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log('An error occurred while submitting the form: ' + error);
                }
            });
        });
    });
    </script><?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customtickets/components/request/request.blade.php ENDPATH**/ ?>