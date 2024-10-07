
<?php
function getSelectedName($data, $id) {
    foreach ($data as $item) {
        if ($item['ID'] == $id) {
            return $item['Name'];
        }
    }
    return '';
}
?>

<form class="w-100 ticket-compose" method="post" id="ticket-compose" data-user-type="<?php echo e(auth()->user()->type); ?>">

          <!-- form row one -->
            <div class="row mt-3">
                <div class="col-sm-6 col-lg-6 row_1">
                    <h5><i class="bi bi-exclamation-circle-fill"></i>General Information</h5>

                    <div class="row mt-3" >
                        <div class="col">
                            <label for="id" class="form-label fw-bold">Id</label>
                          <input type="text" class="form-control" readonly placeholder="Id" aria-label="id" disabled value="<?php echo e($ticket['Id']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState " class="form-label fw-bold">Status</label>
                            <?php if(isset($orderStatus)): ?> 
                            <select id="ShipmentOrderStatusId" class="form-control" disabled name="ShipmentOrderStatusId" onchange="changeStatus('ShipmentOrderStatusId')">
                               <?php $__currentLoopData = $orderStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($status['ID']); ?>" <?php echo e(runtimePreselected($status['ID'] ?? '', $ticket['ShipmentOrderStatusId'])); ?>><?php echo e($status['Name']); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                          </div>
                        <div class="col">
                            <label for="inputState" class="form-label fw-bold">Type</label>
                            <?php if(isset($carriageType)): ?> 
                            <select id="inputState" class="form-control" disabled name="CarriageTypeId">
                              <?php $__currentLoopData = $carriageType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carriage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($carriage['ID']); ?>"><?php echo e($carriage['Name']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                          </div>
                      </div>
                      <div class="row mt-3" >
                        <div class="col-sm-6">
                            <label for="inputState " class="form-label fw-bold">Order Type</label>
                            <?php if(isset($orderTypes)): ?> 
                            <select id="inputState" class="form-control" disabled name="ShipmentOrderTypeId">
                              <?php $__currentLoopData = $orderTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($type['ID']); ?>" <?php echo e(runtimePreselected($type['ID'] ?? '', $ticket['ShipmentOrderTypeId'])); ?>><?php echo e($type['Name']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                            <input type="hidden" id="OrderType" name="OrderType" value="<?php echo e(old('OrderType', getSelectedName($orderTypes, $ticket['ShipmentOrderTypeId']) ?? '')); ?>">                        </div>
                        <div class="col-sm-6">
                            <label for="inputState" class="form-label fw-bold">Incoterms</label>
                              <?php if(isset($incoterms)): ?> 
                              <select id="inputState" class="form-control" disabled name="IncotermsId">
                                <?php $__currentLoopData = $incoterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($term['ID']); ?>" <?php echo e(runtimePreselected($term['ID'] ?? '', $ticket['IncotermsId'])); ?>><?php echo e($term['Name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <?php endif; ?>
                              <input type="hidden" id="Incoterms" name="Incoterms" value="<?php echo e(old('Incoterms', getSelectedName($incoterms, $ticket['IncotermsId']) ?? '')); ?>">                          </div>
                      </div>
                      <div class="row mt-3" >
                        <div class="col-6">
                            <label for="inputState " class="form-label fw-bold">Load Type</label>
                            <?php if(isset($loadType)): ?> 
                            <select id="inputState" class="form-control" disabled name="LoadTypeId">
                              <?php $__currentLoopData = $loadType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $load): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($load['ID']); ?>" <?php echo e(runtimePreselected($load['ID'] ?? '', $ticket['LoadTypeId'])); ?>><?php echo e($load['Name']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                            <input type="hidden" id="LoadType" name="LoadType" value="<?php echo e(old('LoadType', getSelectedName($loadType, $ticket['LoadTypeId']) ?? '')); ?>">
                          </div>

                        <div class="col-6">
                            <label for="quantity" class="form-label fw-bold">Quantity</label>
                            <input type="text" class="form-control" readonly name="Quantity" placeholder="Quantity" aria-label="quantity" value="<?php echo e($ticket['Quantity']); ?>">
                        </div>
                           
                      </div>
                  </div>
                  <div class="col-sm-12 col-lg-6 mt-4">
                    <div id="map" class="gmap_iframe">
                    </div>
                    <input type="hidden" id="pickupLocation"   name="orgion"         value="<?php echo e(json_encode($ticket['orgion'])); ?>">
                    <input type="hidden" id="deliveryLocation" name="destinations"   value="<?php echo e(json_encode($ticket['destination'])); ?>">
                  </div>
            </div>
        <!-- form row two -->
            <div class="row mt-3 "  >

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
                               <select class="form-control" disabled name="ShipperCountryId">
                                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country['ID']); ?>" <?php echo e(runtimePreselected($country['ID'] ?? '', $ticket['ShipperCountryId'])); ?>><?php echo e($country['Name']); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            <?php endif; ?>                     
                            <input type="hidden" id="ShipperCountry" name="ShipperCountry" value="<?php echo e(old('ShipperCountry', getSelectedName($countries, $ticket['ShipperCountryId']) ?? '')); ?>">
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
                                    <input type="text" class="form-control pickup" readonly name="pickupRemarks[<?php echo e($key); ?>]" placeholder="Pickup Remark" value="<?php echo e($remark); ?>" aria-label="Pickup Remark">
                                </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <div class="pickupRemarks">
                                    <input type="text" class="form-control pickup" readonly name="pickupRemarks[0]" placeholder="Pickup Remark" aria-label="Pickup Remark">
                                </div>
                                 <?php endif; ?>
                                <input type="hidden" id="pickupCount" value="<?php echo e(count($ticket['pickupRemarks'])); ?>">
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
                                  <select class="form-control" disabled name="AltPickupCountryId">
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
                                  <select class="form-control" disabled name="ConsigneeCountryId">
                                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['ID']); ?>" <?php echo e(runtimePreselected($country['ID'] ?? '', $ticket['ConsigneeCountryId'])); ?>><?php echo e($country['Name']); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                <?php endif; ?>  
                                <input type="hidden" id="ConsigneeCountry" name="ConsigneeCountry" value="<?php echo e(old('ConsigneeCountry', getSelectedName($countries, $ticket['ConsigneeCountryId']) ?? '')); ?>">             
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
                                    <?php else: ?>
                                    <div class="deliveryRemarks">
                                    <input type="text" class="form-control delivery" readonly name="deliveryRemarks[0]" placeholder="Delivery Remark" aria-label="Delivery Remark">
                                </div>
                                 <?php endif; ?>
                                 <input type="hidden" id="deliveryCount" value="<?php echo e(count($ticket['deliveryRemarks'])); ?>">
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
                                  <select class="form-control" disabled name="AltDeliveryCountryId">
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
            <div class="row mt-3">
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
          
          <div class="row mt-3">
          <label for="notes" class="form-label fw-bold">Chargeable Weight Total</label>
          <br>
          <input type="number" class="form-control" readonly name="ChargeableWeightTotal" placeholder="Chargeable Weight Total"  value="<?php echo e($ticket['ChargeableWeightTotal']); ?>" aria-label="notes" id="ChargeableWeightTotal">
          </div>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var pickupdata   = JSON.parse(document.getElementById("pickupLocation").value);
    var deliverydata = JSON.parse(document.getElementById("deliveryLocation").value);

    const pickupLocation   = { lat: pickupdata.lat,   lng: pickupdata.lng }; 
    const deliveryLocation = { lat: deliverydata.lat, lng: deliverydata.lng };
    
    function initMap() {
            // Create a map centered at the midpoint between pickup and delivery locations
            const mapCenter = {
                lat: (pickupLocation.lat + deliveryLocation.lat) / 2,
                lng: (pickupLocation.lng + deliveryLocation.lng) / 2
            };

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: mapCenter
            });

            // Add a marker for pickup location
            new google.maps.Marker({
                position: pickupLocation,
                map: map,
                title: 'Pickup Location'
            });

            // Add a marker for delivery location
            new google.maps.Marker({
                position: deliveryLocation,
                map: map,
                title: 'Delivery Location'
            });

            // Optional: Draw a line between pickup and delivery locations
            const flightPath = new google.maps.Polyline({
                path: [pickupLocation, deliveryLocation],
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);
    }

  function setHiddenFields() {
    const updates = [
        { selectId: 'orderType', hiddenId: 'OrderType' },
        { selectId: 'incoterms', hiddenId: 'Incoterms' },
        { selectId: 'loadType', hiddenId: 'LoadType' },
        { selectId: 'shipperCountry', hiddenId: 'ShipperCountry' },
        { selectId: 'consigneeCountry', hiddenId: 'ConsigneeCountry' }
    ];

    updates.forEach(({ selectId, hiddenId }) => {
        const selectElement = document.getElementById(selectId);
        const hiddenInput = document.getElementById(hiddenId);
        hiddenInput.value = selectElement.options[selectElement.selectedIndex].text;
    });
}

  window.onload = setHiddenFields;

 

</script>
<?php /**PATH E:\xampp\htdocs\leadport\application\resources\views/pages/customticket/components/view.blade.php ENDPATH**/ ?>