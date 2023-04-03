<?php



function getDefaultCategoryCode($table, $fieldName, $modifier, $defaultCode, $prefix){
    global $conn;
    
	
	$sql    = "SELECT count($fieldName) as total_row FROM $table";
    $result = $conn->query($sql);
    $name   =   '';
    $lastRows   = $result->fetch_object();
	
	
	
    $number     = intval($lastRows->total_row) + 1;
    $defaultCode = $prefix.sprintf('%'.$modifier, $number);
    return $defaultCode;
    
}


	
	
	
	
	
	
	
	
	
	