
$(document).ready(function () {

	activateSteps('Draft')

	var rowIndex = 1;
    var j = 0;
	var type = "number";
	$(document).on('click', '.addgoods', function (e) {
		var goods = ['qty','unitid','description','kgcalc','ldm','volumem3','lengthcm','widthcm','heightcm']
	     $("#goodsTable").append('<tr id="row-'+rowIndex+j+'"></tr>');
		for(var i=0; i<goods.length; i++){
			if(goods[i] == 'description'){
				type = 'text';
			}else{
				type = 'number';
			}
		  $("tr#row-"+rowIndex+j+"").append('<td><input type="'+type+'" class="form-control" name="goods['+rowIndex+']['+goods[i]+']" id="'+rowIndex+'"></td>');
		}
		$("tr#row-"+rowIndex+j+"").append('<td><i class="sl-icon-trash" onclick="removeIndex(this)"></i></td>');
		rowIndex++;
		j++;
	});

});


function removeIndex(index){
	var i = index.parentNode.parentNode.rowIndex;
	 document.getElementById("goodsTable").deleteRow(i);
}


function initAutocomplete(id) {

	const autocomplete = new google.maps.places.Autocomplete(document.getElementById(id));

	autocomplete.addListener('place_changed', () => {

		const place = autocomplete.getPlace();

		document.getElementById(id).innerHTML = place.formatted_address;

		if (place.geometry) {
			
			if(id == 'pickup_address'){

				var origin = {
					'lat' : place.geometry.location.lat(),
					'lng' : place.geometry.location.lng(),
				}
				
				document.getElementById('origin').value = JSON.stringify(origin);;
			}else{
				var destination = {
					'lat' : place.geometry.location.lat(),
					'lng' : place.geometry.location.lng(),
				}
				document.getElementById('destination').value = JSON.stringify(destination);;
			}

        } else {
            document.getElementById(id).innerHTML = 'No details available for input: ' + document.getElementById(id).value;
        }

	})

 }

 
function hideElement(value){

	if(value == 'pickup'){
	   $('.pickup').remove();
	 }if(value == 'delivery'){
	   $('.delivery').remove();
	 }
   }
   
   $(document).on("click",".toggle-outer",function(){
   
		   $(this).toggleClass('checked');
	   const checkbox = $('#toggle');
		   const res = $('#result');
	   const checkboxIsChecked = checkbox.prop('checked'); // Get the current checked state
   
		   if(res.css('display') === 'none'){
			   res.show(300);
			   $('#toggle1').attr('checked', true);
			   $('#toggleLabel1').text('Different pickup');
		 checkbox.prop('checked', true); // Set checkbox to checked
   
		   }
		   else{
			   res.hide(300);
			   $('#toggle1').attr('checked', false);
			   $('#toggleLabel1').text('Different pickup')
		 checkbox.prop('checked', false); // Set checkbox to checked
   
		   }
		   
	   })
   
	   $(document).on("click",".toggle-outer2",function() {
	   const checkbox = $('#toggle2');
	   const res = $('#result2');
	   const checkboxIsChecked = checkbox.prop('checked'); // Get the current checked state
	   
	   // Toggle the class
	   $(this).toggleClass('checked');
   
	   if (res.css('display') === 'none') {
		   res.show(300);
		   checkbox.prop('checked', true); // Set checkbox to checked
		   $('#toggleLabel2').text('Different Delivery');
	   } else {
		   res.hide(300);
		   checkbox.prop('checked', false); // Set checkbox to unchecked
		   $('#toggleLabel2').text('Different Delivery');
	   }
   
	   // You can now use `checkboxIsChecked` to determine if it was checked or not
	 });
   
	 function selectChannel(id) {
	   document.getElementById('TransportChannelId').value = id;
	 }


	function changeStatus(id){

		let selectElement = document.getElementById(id);
		// Get the selected value
		let selectedValue = selectElement.value;
		
		// Get the selected option element
		let selectedOption = selectElement.options[selectElement.selectedIndex];

		activateSteps(selectedOption.text)
	}

	function activateSteps(status) {
	var stepIndicators = document.querySelectorAll('.stepIndicator');	
	const stepStatuses = ['Draft', 'Ready for loading', 'In Transit', 'Completed','Reclamation Started'];
	stepIndicators.forEach((step, index) => {
		if (stepStatuses[index] === status) {
		step.classList.add('active');
		} else if (stepStatuses.indexOf(status) > index) {
		step.classList.add('completed');
		} else {
		step.classList.remove('active', 'completed');
		}
	});
}

var pickupIndex   = (document.getElementById("pickupCount")   != null) ? document.getElementById("pickupCount").value : 1;
var deliveryIndex = (document.getElementById("deliveryCount") != null) ? document.getElementById("pickupCount").value : 1;

  
function addPickupField(type) {
		
	  const container = document.getElementById(type);
	  const newField  = document.createElement('div');
	  newField.classList.add(type);
	  var name = type+'['+[pickupIndex]+']';
	  newField.innerHTML = `
		  <input type="text" class="form-control pickup mt-2" name="`+name+`" placeholder="`+type+`" aria-label="`+type+`">
			  <i class="sl-icon-trash" onclick="removeField(this)"></i>
	  `;
	  container.appendChild(newField);
	  pickupIndex++;
}

function addRemarksField(type) {

	  const container = document.getElementById(type);
	  const newField = document.createElement('div');
	  newField.classList.add(type);
	  var name = type+'['+[deliveryIndex]+']';
	  newField.innerHTML = `
		  <input type="text" class="form-control delivery mt-2" name="`+name+`" placeholder="`+type+`" aria-label="`+type+`">
			  <i class="sl-icon-trash" onclick="removeField(this)"></i>
	  `;
	  container.appendChild(newField);
	  deliveryIndex++;
  }


  // Function to remove a delivery remark field
  function removeField(button) {
	  const field = button.parentElement;
	  field.remove();
  }

  