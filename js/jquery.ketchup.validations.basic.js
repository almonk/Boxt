$.fn.ketchup.validation('required', function(element, value) {
  if(element.attr('type') == 'checkbox') {
    if(element.attr('checked') == true) return true;
    else return false;
  } else {
    if(value.length == 0) return false;
    else return true;
  }
});

$.fn.ketchup.validation('postcode', function(element, value) {
	/*==============================================================================

	Application:   Utility Function
	Author:        John Gardner

	Version:       V1.0
	Date:          18th November 2003
	Description:   Used to check the validity of a UK postcode

	Version:       V2.0
	Date:          8th March 2005
	Description:   BFPO postcodes implemented.
	               The rules concerning which alphabetic characters are allowed in 
	               which part of the postcode were more stringently implementd.

	Version:       V3.0
	Date:          8th August 2005
	Description:   Support for Overseas Territories added                 

	Version:       V3.1
	Date:          23rd March 2008
	Description:   Problem corrected whereby valid postcode not returned, and 
								 'BD23 DX' was invalidly treated as 'BD2 3DX' (thanks Peter 
	               Graves)        

	Version:       V4.0
	Date:          7th October 2009
	Description:   Character 3 extended to allow 'pmnrvxy' (thanks to Jaco de Groot)          


	Parameters:    toCheck - postcodeto be checked. 

	This function checks the value of the parameter for a valid postcode format. The 
	space between the inward part and the outward part is optional, although is 
	inserted if not there as it is part of the official postcode.

	If the postcode is found to be in a valid format, the function returns the 
	postcode properly formatted (in capitals with the outward code and the inward
	code separated by a space. If the postcode is deemed to be incorrect a value of 
	false is returned.

	Example call:

	  if (checkPostCode (myPostCode)) {
	    alert ("Postcode has a valid format")
	  } 
	  else {alert ("Postcode has invalid format")};

	------------------------------------------------------------------------------*/

	  // Permitted letters depend upon their position in the postcode.
	  var alpha1 = "[abcdefghijklmnoprstuwyz]";                       // Character 1
	  var alpha2 = "[abcdefghklmnopqrstuvwxy]";                       // Character 2
	  var alpha3 = "[abcdefghjkpmnrstuvwxy]";                         // Character 3
	  var alpha4 = "[abehmnprvwxy]";                                  // Character 4
	  var alpha5 = "[abdefghjlnpqrstuwxyz]";                          // Character 5

	  // Array holds the regular expressions for the valid postcodes
	  var pcexp = new Array ();

	  // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA
	  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "?[0-9]{1,2})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));

	  // Expression for postcodes: ANA NAA
	  pcexp.push (new RegExp ("^(" + alpha1 + "{1}[0-9]{1}" + alpha3 + "{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));

	  // Expression for postcodes: AANA  NAA
	  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "{1}" + "?[0-9]{1}" + alpha4 +"{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));

	  // Exception for the special postcode GIR 0AA
	  pcexp.push (/^(GIR)(\s*)(0AA)$/i);

	  // Standard BFPO numbers
	  pcexp.push (/^(bfpo)(\s*)([0-9]{1,4})$/i);

	  // c/o BFPO numbers
	  pcexp.push (/^(bfpo)(\s*)(c\/o\s*[0-9]{1,3})$/i);

	  // Overseas Territories
	  pcexp.push (/^([A-Z]{4})(\s*)(1ZZ)$/i);

	  // Load up the string to check
	  var postCode = value;

	  // Assume we're not going to find a valid postcode
	  var valid = false;

	  // Check the string against the types of post codes
	  for ( var i=0; i<pcexp.length; i++) {
	    if (pcexp[i].test(postCode)) {

	      // The post code is valid - split the post code into component parts
	      pcexp[i].exec(postCode);

	      // Copy it back into the original string, converting it to uppercase and
	      // inserting a space between the inward and outward codes
	      postCode = RegExp.$1.toUpperCase() + " " + RegExp.$3.toUpperCase();

	      // If it is a BFPO c/o type postcode, tidy up the "c/o" part
	      postCode = postCode.replace (/C\/O\s*/,"c/o ");

	      // Load new postcode back into the form element
	      valid = true;

	      // Remember that we have found that the code is valid and break from loop
	      break;
	    }
	  }

	  // Return with either the reformatted valid postcode or the original invalid 
	  // postcode
	  if(valid){return true;}else{return false;};
});


$.fn.ketchup.validation('minlength', function(element, value, minlength) {
  if(value.length < minlength) return false;
  else return true;
});

$.fn.ketchup.validation('maxlength', function(element, value, maxlength) {
  if(value.length > maxlength) return false;
  else return true;
});

$.fn.ketchup.validation('rangelength', function(element, value, minlength, maxlength) {
  if(value.length >= minlength && value.length <= maxlength) return true;
  else return false;
});


$.fn.ketchup.validation('min', function(element, value, min) {
  if(parseInt(value) < min) return false;
  else return true;
});

$.fn.ketchup.validation('max', function(element, value, max) {
  if(parseInt(value) > max) return false;
  else return true;
});

$.fn.ketchup.validation('range', function(element, value, min, max) {
  if(parseInt(value) >= min && parseInt(value) <= max) return true;
  else return false;
});


$.fn.ketchup.validation('number', function(element, value) {
  if(/^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(value)) return true;
  else return false;
});

$.fn.ketchup.validation('digits', function(element, value) {
  if(/^\d+$/.test(value)) return true;
  else return false;
});


$.fn.ketchup.validation('email', function(element, value) {
  if(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(value)) return true;
  else return false;
});


$.fn.ketchup.validation('url', function(element, value) {
  if(/^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(value)) return true;
  else return false;
});


$.fn.ketchup.validation('username', function(element, value) {
  if(/^([a-zA-Z])[a-zA-Z_-]*[\w_-]*[\S]$|^([a-zA-Z])[0-9_-]*[\S]$|^[a-zA-Z]*[\S]$/.test(value)) return true;
  else return false;
});


$.fn.ketchup.validation('match', function(element, value, match) {
  if($(match).val() != value) return false;
  else return true;
});


$.fn.ketchup.validation('date', function(element, value) {
  if(!/Invalid|NaN/.test(new Date(value))) return true;
  else return false;
})


function watchSelect(type) {
  $('input['+$.fn.ketchup.defaults.validationAttribute+'*="'+type+'"]').each(function() {
    var el = $(this);

    $('input[name="'+el.attr('name')+'"]').each(function() {
      var al = $(this);
      if(al.attr($.fn.ketchup.defaults.validationAttribute).indexOf(type) == -1) al.blur(function() { el.blur(); });
    });
  });
}

$(document).ready(function() {
  watchSelect('minselect');
  watchSelect('maxselect');
  watchSelect('rangeselect');
});

$.fn.ketchup.validation('minselect', function(element, value, min) {
  if($('input[name="'+element.attr('name')+'"]:checked').length >= min) return true;
  else return false;
});

$.fn.ketchup.validation('maxselect', function(element, value, max) {
  if($('input[name="'+element.attr('name')+'"]:checked').length <= max) return true;
  else return false;
});

$.fn.ketchup.validation('rangeselect', function(element, value, min, max) {
  var checked = $('input[name="'+element.attr('name')+'"]:checked');
  
  if(checked.length >= min && checked.length <= max) return true;
  else return false;
});