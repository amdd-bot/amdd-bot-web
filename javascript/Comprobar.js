


function validateInformationForm()
{
  if ($("#information_name").val() == null || $("#information_name").val() == "" || $("#information_phone").val() == null || $("#information_phone").val() == "" || $("#information_email").val() == null || $("#information_email").val() == "" || $("#information_address").val() == null || $("#information_address").val() == "" || $("#information_country").val() == null || $("#information_country").val() == "" || $("#information_zip").val() == null || $("#information_zip").val() == "" || $("#information_city").val() == null || $("#information_city").val() == "") {  
	$('#messageBox').hide();
	$('#messageBox').addClass('notification warning closeable');
	$('#messageBox').html("<p style='color: red;'>Falta algo de tu informacion! Fijate bien la informacion con * debe ser completada</p>");
	$('#messageBox').show("fast", "linear");
	return false;
  }
}