document.addEventListener('DOMContentLoaded', function() {

	var totalField = document.getElementById('acf-field-invoice_total');
	totalField.setAttribute('readonly','1');

	jQuery('td[data-field_key="field_5719274776a30"] input').attr('readonly','1');
	jQuery('#acf-line_item').on( "change","input",computeValues );


});

function invoiceWizardUpdateDom(){
	jQuery('td[data-field_key="field_5719274776a30"] input').attr('readonly','1');
}

function computeValues(){

	jQuery('#acf-line_item').on( "change","input",computeValues );

	var rates = jQuery('td[data-field_key="field_57191e75a0434"] input');
	var finalRates = []; 
	var finalHours = [];

	for (var i = 0; i < rates.length; i++) {
		if( !isNaN(parseFloat(rates[i].value) ) ){
			finalRates[i] = parseInt(rates[i].value);
		}
	}

	var hours = jQuery('td[data-field_key="field_57191e7da0435"] input');

	for (var i = hours.length - 1; i >= 0; i--) {
		if( !isNaN(parseFloat(hours[i].value) ) ){
			finalHours[i] = parseFloat(hours[i].value);
		}
	}

	var totals = [];
	var sumTotal = 0;
	var totalFields = jQuery('td[data-field_key="field_5719274776a30"] input');

	for (var i = 0; i < rates.length; i++) {
		totals[i] = finalRates[i] * finalHours[i];
	}

	for (var x = 0; x < totalFields.length; x++) {
		if( !isNaN(totals[x]) ){
			totalFields[x].value = totals[x];
			sumTotal += parseFloat(totals[x]);
		}
		
	} 
	console.log(sumTotal);

	jQuery('#acf-field-invoice_total').val(sumTotal)
}

//https://parall.ax/products/jspdf