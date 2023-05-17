<?php
    try 
	{
        $db = new PDO( 'mysql:host=localhost;dbname=pkmn' , 'root' , 'root') ;
    }
    catch (Exception $e) 
	{
        die ( 'Erreur : ' . $e->getMessage () ) ;
    }
?>
