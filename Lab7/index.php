<?php
libxml_use_internal_errors(true);
$dom = new DOMDocument;
$dom->load('data.xml');
// if ($dom->validate()) {
//     echo "This document is valid\n";
// } else {
//     echo "This document is invalid\n";
// }
var_dump(libxml_get_errors());