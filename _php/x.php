<?php

header( "Content-type: application/json" );

if ( isset( $_POST[ "username" ] ) )
{
    $username = $_POST[ "username" ];

    echo json_encode( array( "status" => "sucessu", "body" => "$username" ) );
}
else
{
    echo json_encode( array( "status" => "sucessu", "body" => "nao tem username" ) );
}

?>