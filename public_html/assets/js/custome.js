$("#mobile-number").intlTelInput({
preferredCountries: [ "sa", "gb" ]

});

$(document).on('click', '.country', function() {
var id=$(this).data('dial-code');

$('#ctcode').val(id);
});

jQuery(".mapOffice-Beijing").click(function () {
jQuery(".mapOffice-Beijing .mapOfficeOpen").toggle();
});
jQuery(".mapOffice-HongKong").click(function () {
jQuery(".mapOffice-HongKong .mapOfficeOpen").toggle();
});
jQuery(".mapOffice-Tokyo").click(function () {
jQuery(".mapOffice-Tokyo .mapOfficeOpen").toggle();
});
		