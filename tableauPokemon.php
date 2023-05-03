<?php
    include('connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="Author" lang="fr" content="Justine BONDU, Alizéa LEBARON, Marc DUFOUR, Ashanti NJANJA"  />
        <link rel="stylesheet" href="tabPKM.css">
        <title>Données Pokemons</title>
    </head>

<body>
    <header>
        <h1>Documentation Pokemons 1ere Gen</h1>
        <a class="quiz" href="index.php"> <img class="head" src='img/QUIZ.png' title="Qui es donc ?" alt="Qui es donc ?"></a>
    </header>


    <table>
    
    <tr>
        <th class="cell">Id</th>
        <th class="cell">Nom</th>
        <th class="cell">Type 1</th>
        <th class="cell">Type 2</th>
    </tr>
    
    <?php
        $imgType = array( "im/logNom/Normal.png",   "im/logNom/Feu.png"    , "im/logNom/Eau.png"   , "im/logNom/Plante.png" , "im/logNom/Électrik.png", 
                          "im/logNom/Glace.png" ,   "im/logNom/Combat.png" , "im/logNom/Poison.png", "im/logNom/Sol.png"    , "im/logNom/Vol.png", 
                          "im/logNom/Psy.png"   ,   "im/logNom/Insecte.png", "im/logNom/Roche.png" , "im/logNom/Spectre.png", "im/logNom/Dragon.png",
                          "im/logNom/Ténèbres.png", "im/logNom/Acier.png"  , "im/logNom/Fée.png" );

        $SQLPKMRequest = $db->prepare ("SELECT PKMN_Nom_FR, p.PKMN_ID, Types_Nom_FR, e.Types_ID
                                        FROM Pokemon p JOIN EtreType e ON p.PKMN_ID = e.PKMN_ID
                                        JOIN Types t   ON e.Types_ID = t.Types_ID
                                        GROUP BY p.PKMN_ID
                                        ORDER BY p.PKMN_ID;");
        //GROUP BY p.PKMN_ID, e.Types_ID

        $SQLPKMRequest -> execute();
        $PKMRequest = $SQLPKMRequest-> fetchAll ();

        foreach ($PKMRequest as $PKMs)
        {
            $ID = $PKMs['PKMN_ID'];

            $SQLTypeRequest = $db->prepare ("SELECT * FROM Pokemon p JOIN EtreType e ON p.PKMN_ID  = e.PKMN_ID
                                                                     JOIN Types t    ON e.Types_ID = t.Types_ID
                                            WHERE 	p.PKMN_ID = '$ID'                      ;");
            $SQLTypeRequest -> execute();
            $TypeRequest = $SQLTypeRequest-> fetchAll ();
            
            $cpt = 0;
            $Type1 = null;
            $Type2 = null;

            foreach ($TypeRequest as $TypeRequest) 
            {
                if 		($cpt == 0) 	{$Type1 = $TypeRequest['Types_ID'];}
                else				    {$Type2 = $TypeRequest['Types_ID'];}
                
                $cpt++;
            }

            echo "<tr>";

            // ID du PKM
            echo "<td class=\"cell\">" .$PKMs ['PKMN_ID' ] ."</td>"; 

            // Nom du PKM
            echo "<td class=\"cell\"> <img src='img_pokemon/" .$PKMs ['PKMN_ID' ] .".png' alt=\"" .$PKMs['PKMN_Nom_FR'] ."\" class=\"imgPKM\"> </br>"
                                       .$PKMs ['PKMN_Nom_FR' ]
                 ."</td>"; 

            echo "<td class=\"cell\"> <img src='" .$imgType[ $Type1 -1 ] ."' alt=\"" .$imgType[ $PKMs['Types_ID'] -1 ] ."\" class=\"imgType\"> </td>"; // Img du Type

            if (!empty($Type2)) {
                echo "<td class=\"cell\"> <img src='" .$imgType[ $Type2 -1 ] ."' alt=\"" .$imgType[ $PKMs['Types_ID'] -1 ] ."\" class=\"imgType\"> </td>"; // Img du Type
            }
            else
            {
                echo "<td class=\"cell\">\</td>"; // Img du Type
            }
            
            echo "</tr>";
        }
    ?>

    </table>

</body>
<footer>
	<p>© 2023 par Justine BONDU, Alizéa LEBARON, Marc DUFOUR, Ashanti NJANJA</p>
</footer>
</html>