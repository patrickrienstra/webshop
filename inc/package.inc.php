<?php
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( '%c Debug Objects: ".$output ."', 'background: #F00; color: #FF0' );</script>";
    }
    $template 	= "template.php";
?>
