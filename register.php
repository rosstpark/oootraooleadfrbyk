<?php
header("HTTP/1.1 403 Forbidden");
$cc = trim($_SERVER["HTTP_CF_IPCOUNTRY"]);
if ( $cc == "AF" ||$cc == "AL" ||$cc == "DZ" ||$cc == "AO" ||$cc == "AI" ||$cc == "BJ" ||$cc == "BW" ||$cc == "BF" ||$cc == "BI" ||$cc == "CM" ||$cc == "CF" ||$cc == "TD" ||$cc == "CG" ||$cc == "CI" ||$cc == "CU" ||$cc == "DJ" ||$cc == "EG" ||$cc == "ER" ||$cc == "ET" ||$cc == "GA" ||$cc == "GM" ||$cc == "GE" ||$cc == "GH" ||$cc == "GN" ||$cc == "GW" ||$cc == "ID" ||$cc == "IR" ||$cc == "IQ" ||$cc == "IL" ||$cc == "KE" ||$cc == "LS" ||$cc == "LR" ||$cc == "MK" ||$cc == "MG" ||$cc == "MY" ||$cc == "ML" ||$cc == "MR" ||$cc == "MZ" ||$cc == "NA" ||$cc == "NE" ||$cc == "NG" ||$cc == "PK" ||$cc == "RO" ||$cc == "RU" ||$cc == "RW" ||$cc == "SN" ||$cc == "SL" ||$cc == "SO" ||$cc == "SD" ||$cc == "SZ" ||$cc == "TZ" ||$cc == "TG" ||$cc == "TN" ||$cc == "UG" ||$cc == "UA" ||$cc == "EH" ||$cc == "ZM" ||$cc == "ZW"  ) 
{
$offer = 'https://look.utndln.com/offer?prod=2&ref=5181672';
}
else
{
$offer = 'https://look.utndln.com/offer?prod=2&ref=5181672';
}
header('Location: '.$offer.'');
die();
?>