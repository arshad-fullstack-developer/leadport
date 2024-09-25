<style>
   html body {
   background: #F5F7FA;
   }
</style>
<form class="w-100 ticket-compose" method="post" id="ticket-compose">
   <div class="row mt-3 bg-white p-3">
      <div class="col-sm-4 col-lg-3">
         <label for="temp" class="form-label fw-bold">Load Type</label>
         <?php if(isset($loadType)): ?> 
                            <select id="inputState" class="form-control" readonly name="LoadTypeId" disabled>
                              <?php $__currentLoopData = $loadType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($load['ID']); ?>" <?php echo e(runtimePreselected($load['ID'] ?? '', $ticket['LoadTypeId'] ?? '')); ?>><?php echo e($load['Name']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
      </div>
      <div class="col-sm-4 col-lg-3">
         <label for="quantity" class="form-label fw-bold">Quantity</label>
         <input type="text" class="form-control" readonly name="Quantity" placeholder="Quantity" aria-label="quantity" value="<?php echo e($ticket['Quantity']); ?>">
         </div>
      <div class="col-sm-4 col-lg-3">
         <label for="adr" class="form-label fw-bold">Type</label>
         <?php if(isset($carriageType)): ?> 
         <select id="inputState" class="form-control" readonly name="CarriageTypeId" disabled>
            <?php $__currentLoopData = $carriageType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carriage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($carriage['ID']); ?>"><?php echo e($carriage['Name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
         <?php endif; ?>
      </div>
      <div class="col-sm-4 col-lg-3">
         <label for="code" class="form-label fw-bold">Incoterms</label>
         <?php if(isset($incoterms)): ?> 
                              <select id="inputState" class="form-control" readonly name="IncotermsId" disabled>
                                <?php $__currentLoopData = $incoterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($term['ID']); ?>" <?php echo e(runtimePreselected($term['ID'] ?? '', $ticket['IncotermsId'])); ?>><?php echo e($term['Name']); ?></option>
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
                      <input type="text" class="form-control pickadate" readonly id="shipper_date" name="PickupDate" placeholder="Date" aria-label="date" value="<?php echo e($ticket['PickupDate']); ?>">
                  </div>
                  <div class="col">
                    <label for="id" class="form-label fw-bold">Time</label>
                    <input type="time" class="form-control" readonly name="PickupTime" placeholder="Id" aria-label="time" value="<?php echo e($ticket['PickupTime']); ?>">
                </div>
                    </div>
                    <div class="row mt-3" >
                      <div class="col-12">
                          <label for="shipper" class="form-label fw-bold">Shipper</label>
                          <input type="text" class="form-control" readonly placeholder="Add Shipper" name="Shipper" aria-label="shipper" value="<?php echo e($ticket['Shipper']); ?>">
                        </div>
                    </div>
                    <div class="row mt-3" >
                      <div class="col">
                        <label for="country" class="form-label fw-bold">Country </label>
                          <?php if(isset($countries) && count($countries) > 0): ?>
                               <select class="form-control" readonly name="ShipperCountryId" disabled>
                                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country['ID']); ?>"><?php echo e($country['Name']); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            <?php endif; ?>                     
                      </div>
                    <div class="col">
                      <label for="City" class="form-label fw-bold">City</label>
                      <input type="text" class="form-control" readonly placeholder="City" name="ShipperCity" aria-label="City" value="<?php echo e($ticket['ShipperCity']); ?>" onkeypress="initAutocomplete('pickup_city')" id="pickup_city">
                  </div>
                      <div class="col-sm-12 col-lg-6">
                        <label for="country" class="form-label fw-bold">Index </label>
                        <input type="text" class="form-control" readonly placeholder="Add index" name="ShipperIndex" aria-label="country" value="<?php echo e($ticket['ShipperIndex']); ?>">
                        </div>

                          <div class="col-12 mt-3">
                            <label for="Address" class="form-label fw-bold">Address </label>
                            <input type="text" class="form-control" readonly placeholder="Address" name="ShipperAddress" value="<?php echo e($ticket['ShipperAddress']); ?>" aria-label="Address" onkeypress="initAutocomplete('pickup_address')" id="pickup_address">
                            <input type="hidden" name="origin" id="origin">
                          </div>

                            <div id="pickup-container" class="col-12 mt-3 pickup">
                            <label for="Pickup Remark" class="form-label fw-bold">Pickup Remark</label>
                            <div id="pickupRemarks">
                                <!-- Existing delivery field -->
                                 <?php if(isset($ticket['pickupRemarks']) && count($ticket['pickupRemarks']) > 0): ?>
                                    <?php $__currentLoopData = $ticket['pickupRemarks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="pickupRemarks mt-3">
                                    <input type="text" class="form-control pickup" readonly  name="pickupRemarks[<?php echo e($key); ?>]" placeholder="Pickup Remark" value="<?php echo e($remark); ?>" aria-label="Pickup Remark">
                                </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                            </div>
                        </div>

                          <div class="col-12">
                            <div class="toggle-outer">
                              <div class="toggle-inner">
                                  <input type="checkbox" id="toggle" name="IsDifferentPickup">
                              </div>
                          </div>
                          <label id="toggleLabel toggleLabel1" for="toggle">
                              Different pickup
                          </label>
                          <div id="result">
                            <div class="row mt-3" >
                              <div class="col-12">
                                  <label for="alt_shipper" class="form-label fw-bold">Shipper</label>
                                  <input type="text" class="form-control" readonly placeholder="Add Shipper" name="AltShipper" value="<?php echo e($ticket['AltShipper']); ?>" aria-label="alt_shipper">
                              </div>
                            </div>

                          <div class="row mt-3">
                            <div class="col">
                              <label for="country" class="form-label fw-bold">Country</label>
                                <?php if(isset($countries) && count($countries) > 0): ?>
                                  <select class="form-control" readonly name="AltPickupCountryId" disabled>
                                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['ID']); ?>" <?php echo e(runtimePreselected($country['ID'] ?? '', $ticket['AltPickupCountryId'])); ?>><?php echo e($country['Name']); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                <?php endif; ?>  
                          </div>
                          <div class="col">
                            <label for="City" class="form-label fw-bold">City</label>
                            <input type="text" class="form-control" readonly name="AltPickupCity" placeholder="City" value="<?php echo e($ticket['AltPickupCity']); ?>" aria-label="City" onkeypress="initAutocomplete('dif_pickup_city')" id="dif_pickup_city">
                        </div>
                            <div class="col-sm-12 col-lg-6">
                              <label for="index" class="form-label fw-bold">Index </label>
                              <input type="text" class="form-control" readonly name="AltPickupIndex" placeholder="Add index" value="<?php echo e($ticket['AltPickupIndex']); ?>" aria-label="index">
                              </div>
                            </div>
                            <div class="mt-3">
                              <label for="Address" class="form-label fw-bold">Address </label>
                              <input type="text" class="form-control" readonly name="AltPickupAddress" placeholder="Address" value="<?php echo e($ticket['AltPickupAddress']); ?>" aria-label="Address" onkeypress="initAutocomplete('dif_pickup_address')" id="dif_pickup_address">
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
    <input type="text" class="form-control pickadate" readonly id="consignee_date" name="DeliveryDate" value="<?php echo e($ticket['DeliveryDate']); ?>" placeholder="Date" aria-label="date">
</div>
<div class="col">
  <label for="id" class="form-label fw-bold">Time</label>
  <input type="time" class="form-control" readonly placeholder="Id" name="DeliveryTime" aria-label="time" value="<?php echo e($ticket['DeliveryTime']); ?>">
</div>
</div>

  <div class="row mt-3" >
    <div class="col">
      <label for="consignee" class="form-label fw-bold">Consignee</label>
      <input type="text" class="form-control" readonly placeholder="Add Consignee" name="Consignee" value="<?php echo e($ticket['Consignee']); ?>" aria-label="consignee">
  </div>
    
  <div class="row mt-3">

      <div class="col">
        <label for="country" class="form-label fw-bold">Country</label>
           <?php if(isset($countries) && count($countries) > 0): ?>
                <select class="form-control" readonly name="ConsigneeCountryId" disabled>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($country['ID']); ?>" <?php echo e(runtimePreselected($country['ID'] ?? '', $ticket['ConsigneeCountryId'])); ?>><?php echo e($country['Name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              <?php endif; ?>               
      </div>

      <div class="col">
        <label for="City" class="form-label fw-bold">City</label>
      <input type="text" class="form-control" readonly placeholder="City" name="ConsigneeCity" value="<?php echo e($ticket['ConsigneeCity']); ?>" aria-label="City" onkeypress="initAutocomplete('delivery')" id="delivery">
    </div>
    
      <div class="col-sm-12 col-lg-6">
      <label for="country" class="form-label fw-bold">Index</label>
      <input type="text" class="form-control" readonly placeholder="Add index" name="ConsigneeIndex" value="<?php echo e($ticket['ConsigneeIndex']); ?>" aria-label="country">
      </div>
      
        <div class="col-12 mt-3">
          <label for="Address" class="form-label fw-bold">Address</label>
          <input type="text" class="form-control" readonly placeholder="Address" name="ConsigneeAddress" value="<?php echo e($ticket['ConsigneeAddress']); ?>" aria-label="Address" onkeypress="initAutocomplete('delivery_address')" id="delivery_address">
          <input type="hidden" name="destination" id="destination">
        </div>

        <div id="delivery-container" class="col-12 mt-3 delivery">
          <label for="Delivery Remark" class="form-label fw-bold">Delivery Remark</label>
          <div id="deliveryRemarks">
              <!-- Existing delivery field -->

              <?php if(isset($ticket['deliveryRemarks']) && count($ticket['deliveryRemarks']) > 0): ?>
                  <?php $__currentLoopData = $ticket['deliveryRemarks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="deliveryRemarks mt-3">
                  <input type="text" class="form-control delivery" readonly name="deliveryRemarks[<?php echo e($key); ?>]" placeholder="Delivery Remark" value="<?php echo e($remark); ?>" aria-label="Delivery Remark">
              </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
          </div>
      </div>
     
        <div class="col-12">
          <div class="toggle-outer2">
            <div class="toggle-inner">
                <input type="checkbox" id="toggle2" name="IsDifferentDelivery">
            </div>
        </div>
        <label id="toggleLabel toggleLabel2" for="toggle">
            Different Delivery
        </label>
        <div id="result2">
          <div class="row mt-3" >
            <div class="col-12">
                <label for="alt_delivery" class="form-label fw-bold">Delivery</label>
                <input type="text" class="form-control" readonly placeholder="Add Delivery" name="AltDelivery" value="<?php echo e($ticket['AltDelivery']); ?>" aria-label="alt_delivery">
            </div>
          </div>

          <div class="row mt-3" >
          <div class="col">
            <label for="country" class="form-label fw-bold">Country </label>
               <?php if(isset($countries) && count($countries) > 0): ?>
                <select class="form-control" readonly name="AltDeliveryCountryId" disabled>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($country['ID']); ?>" <?php echo e(runtimePreselected($country['ID'] ?? '', $ticket['AltDeliveryCountryId'])); ?>><?php echo e($country['Name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              <?php endif; ?> 
          </div>
        <div class="col">
          <label for="City" class="form-label fw-bold">City</label>

          <input type="text" class="form-control" readonly placeholder="City" name="AltDeliveryCity" value="<?php echo e($ticket['AltDeliveryCity']); ?>" aria-label="City" onkeypress="initAutocomplete('dif_delivery')" id="dif_delivery">
      </div>
          <div class="col-sm-12 col-lg-6">
            <label for="index" class="form-label fw-bold">Index </label>
            <input type="text" class="form-control" readonly placeholder="Add index" name="AltDeliveryIndex" value="<?php echo e($ticket['AltDeliveryIndex']); ?>" aria-label="index">
            </div>
          </div>
          <div class="mt-3">
            <label for="Address" class="form-label fw-bold">Address </label>
            <input type="text" class="form-control" readonly placeholder="Address" name="AltDeliveryAddress" value="<?php echo e($ticket['AltDeliveryAddress']); ?>" aria-label="Address">
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
                        <input type="text" class="form-control" readonly name="IsTempSensitive" placeholder="Type sensitive here" value="<?php echo e($ticket['IsTempSensitive']); ?>" aria-label="temp">
                    </div>
                    <div class="col-sm-4 col-lg-2">
                        <label for="range" class="form-label fw-bold">Temp Range</label>
                        <input type="text" class="form-control" readonly name="TempValue" placeholder="Type Range here" value="<?php echo e($ticket['TempValue']); ?>" aria-label="range">
                    </div>
                    <div class="col-sm-4 col-lg-2">
                    <label for="adr" class="form-label fw-bold">ADR</label>
                    <input type="text" class="form-control" readonly name="ADRValue" placeholder="Type ADR here" value="<?php echo e($ticket['ADRValue']); ?>" aria-label="adr">
                </div>
                <div class="col-sm-4 col-lg-2">
                    <label for="code" class="form-label fw-bold">UN Code</label>
                    <input type="text" class="form-control" readonly name="UNCode" placeholder="Type UN code here" value="<?php echo e($ticket['UNCode']); ?>" aria-label="code">
                </div>
                <div class="col-sm-4 col-lg-2">
                <label for="fragile" class="form-label fw-bold">Fragile</label>
                <input type="text" class="form-control" readonly name="FragileValue" placeholder="Type Fragile here" value="<?php echo e($ticket['FragileValue']); ?>" aria-label="fragile">
            </div>
            <div class="col-sm-4 col-lg-2">
                <label for="notes" class="form-label fw-bold">Notes</label>
            <input type="text" class="form-control" readonly name="Notes" placeholder="About Notes" value="<?php echo e($ticket['Notes']); ?>"  aria-label="notes">
            </div>
             <?php echo $__env->make('pages.customticket.components.misc.view-goods', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        <div class="row mt-3 bg-white p-3">
            <label for="notes" class="form-label fw-bold">Chargeable Weight Total</label>
            &nbsp;&nbsp;
            <input type="number" class="form-control" readonly name="ChargeableWeightTotal" placeholder="Chargeable Weight Total" aria-label="notes" id="ChargeableWeightTotal" value="<?php echo e($ticket['ChargeableWeightTotal']); ?>" >
        </div>
</form>
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customtickets/components/request/view.blade.php ENDPATH**/ ?>