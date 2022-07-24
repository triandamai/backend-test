<?php 
    $array = ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua'];
    echo anagram($array);
    
    function anagram($arr)
    {
        // count array 
        $n 			= count($arr);
        // insiation array
        $results 		= array();
        $value 	        = array();
        // looping for first index array
        for ($i = 0; $i < $n - 1; $i++) {
            // looping for second index array
            for ($j = $i + 1; $j < $n; $j++) {
                // check and count different char from string between 2 string 
                if (count_chars($arr[$i], 1) == count_chars($arr[$j], 1)) {
                    // check if array value containts to avoid redundant
                    if (in_array($arr[$i], $value)) {
                        // check if array value not containts to avoid redundant
                        if (in_array($arr[$j], $value) !== TRUE) {
                            // push to array value
                            array_push($value, $arr[$j]);
                            // push array value to array results
                            $results[] = $value;
                        }
                    } else {
                        // check if value has value inside
                        if(count($value) > 0) {
                            // delete array
                            unset($value);
                            // inisiate again
                            $value = array();
                            // push for new value
                            array_push($value, $arr[$i], $arr[$j]);
                            // push array value to array results
                            $results[] = $value;
                        }
                        // push to array value
                        array_push($value, $arr[$i], $arr[$j]);
                    }
                } else {
                    // check if array value containts to avoid redundant
                    if (in_array($arr[$j], $value)) {
                        // check if array value not containts to avoid redundant
                        if (in_array($arr[$i], $value) !== TRUE) {
                            // push to array value
                            array_push($value, $arr[$i]);
                            // push array value to array results
                            $results[] = [$arr[$i]];
                        }
                    }
                }
            }
        }
        // return encode array to json
        return json_encode($results);
    }
?>