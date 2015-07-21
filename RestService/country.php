<?php
//function returns country name if there is a match in $countries array
//$find :name of the country to find
function get_country($find) {

      $countries = array("Angola",
              "Aruba",
              "Bahrain",
			  "Bahamas",
			  "Bangladesh",
			  "Cuba",
			  "Denmark",
			  "Egypt",
			  "France",
			  "Georgia",
			  "Germany",
			  "India",
			  "USA",
			  "Yemen",
			  "Zambia"
            );

      foreach($countries as $country)
      {
		  $tempCountry = strtolower($country);
		  $tempFind = strtolower($find);
        if($tempCountry==$tempFind)
          {
            return $country;
            break;
          }
      }
}

?>