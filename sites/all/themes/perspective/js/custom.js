(function ($) {
    jQuery(document).ready(function(){
        $('#front-submit-custom-search').click(function(){

        	var url = 'http://www.overwinteren.nl/nl/content/searchpage';
			var searchType = $('#search-type');
			var searchCountries = $('#search-countries');
			var searchPersons = $('#search-persons').val();

			var countryParam = '';
			var personsParam = '';

			if (searchCountries.val() == "All") {
				searchCountries.css('border-color', 'red');
				return false;
			}

			if (searchType.val() === "rent") {
				var countryParam = '?f[0]=field_advaccommodaties%3A' + searchCountries.val();
				var personsParam = '&f[1]=field_advpersons%3A' + searchPersons;

				console.log(searchPersons);
				console.log(personsParam);

			} else if (searchType.val() === "sale") {
				var countryParam = '?f[0]=field_atk_land_regio%3A' + searchCountries.val();
			}

        	window.location.replace(url + countryParam + personsParam);

        });
    });
 
}(jQuery));