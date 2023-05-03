<?php
    try 
	{
        $db = new PDO( 'mysql:host=localhost;dbname=pkmn' , 'root' , '') ;
    }
    catch (Exception $e) 
	{
        die ( 'Erreur : ' . $e->getMessage () ) ;
    }
?>