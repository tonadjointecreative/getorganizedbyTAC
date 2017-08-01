<?php

// Debugging function
function logc( $data ) {
	$output = $data;
	if ( is_array( $output ) )
		$output = implode( ',', $output);
	echo "<script>console.log( 'PHP: " . $output . "' );</script>";
}

// Print date nice
function get_nice_date($timestamp) {

    $date = date('Ymd', strtotime($timestamp));
    $class = "";
    if($date == date('Ymd')) {
      $date = 'Today';
      $class = ' green';
    } 
    else if($date == date('Ymd',time() - (24 * 60 * 60))) {
      $date = 'Yesterday';
      $class = ' red';
    }
    else if($date == date('Ymd',time() + (24 * 60 * 60))) {
      $date = 'Tomorrow';
      $class = ' green';
    }        
    else{
        if($date < date('Ymd',time())){
            $class= ' red';
        } else{
            $class= ' blue';
        }
        $date = date('j M', strtotime($timestamp));
    }
    echo '<div class="date'.$class.'"> '.$date.'</div>';
} 

?>