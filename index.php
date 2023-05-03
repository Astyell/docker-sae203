<?php
	session_start();
	include('connexion.php');

	if (empty($_SESSION)) 
	{
		$SQLPKMRequest = $db->prepare ("SELECT * FROM Pokemon;");
		$SQLPKMRequest -> execute();
		$PKMRequest = $SQLPKMRequest-> fetchAll ();

		$random = random_int(1, 151);

		foreach ($PKMRequest as $PKMs) 
		{
			if ($PKMs['PKMN_ID'] == $random)
			{
				$_SESSION['PKMN_Random'] = $PKMs;
			}
		}

		$_SESSION['NB_Essais'] = 0;
	}

	if (!empty($_POST['select']))
	{
		$_SESSION['choix'][$_SESSION['NB_Essais']] = $_POST['select'];
		$_SESSION['NB_Essais']++;
	}

	
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="Author" lang="fr" content="Justine BONDU, Alizéa LEBARON, Marc DUFOUR, Ashanti NJANJA"  />
	<link rel="stylesheet" href="style.css">
	<title>Quel est ce pokemon ?</title>
</head>

<body>
	<header>
		<h1>Quel est ce pokemon ?</h1>
		<a class="soluce" href="tableauPokemon.php"> <img src='img/POKE2.png' title="Beignet de poké" alt="Pokedonnées"></a>
	</header>


	<?php
		
		echo $_SESSION['PKMN_Random']['PKMN_Nom_FR'];

	?>

	<aside>
        <p>
			Vous avez effectuez <?php$_SESSION ['NB_Essais'] ?> coups
			<br />
			
		</p>
    </aside>

	<fieldset>
		<form action="index.php" method="post">

			<label for="select">Choisissez un pokémon : </label>

			<select id="select" name="select">
				<?php

					$SQLPKMRequest = $db->prepare ("SELECT * FROM Pokemon;");
					$SQLPKMRequest -> execute();
					$PKMRequest = $SQLPKMRequest-> fetchAll ();

					foreach ($PKMRequest as $PKMs) 
					{
						echo "<option value=", $PKMs['PKMN_ID'] , ">" , $PKMs['PKMN_ID'], " - " ,$PKMs['PKMN_Nom_FR'] , "</option>";
					}

				?>

			</select>

			<input type="submit" id="button" value="Entrez"></br>

		</form>
	</fieldset>

	<table>
		<tr>
			<th> Pokémon </th>
			<th> Type 1 </th>
			<th> Type 2 </th>
			<th> Taille </th>
			<th> Poids </th>
			<th> Couleur </th>
			<th> Peut-il évoluer ? </th>
		</tr>
		
		<?php
			$SQLPKMRequest = $db->prepare ("SELECT * FROM Pokemon;");
			$SQLPKMRequest -> execute();
			$PKMRequest = $SQLPKMRequest-> fetchAll ();

			$victoire = false;
			
			if (!empty($_SESSION['choix']))
			{
			foreach ($_SESSION['choix'] as $PKMs) 
			{
				foreach ($PKMRequest as $Pokemons) 
				{

					if ($Pokemons['PKMN_ID'] == $PKMs)
					{
						if ($Pokemons['PKMN_Evolution'] == 0) { $evolution = "Faux"; } else { $evolution = "Vrai"; }

						$ID        = $Pokemons               ['PKMN_ID'];
						$ID_Random = $_SESSION['PKMN_Random']['PKMN_ID'];

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
							if 		($cpt == 0) 	{$Type1 = $TypeRequest['Types_Nom_FR'];}
							else				    {$Type2 = $TypeRequest['Types_Nom_FR'];}
							
							$cpt++;
						}

						if (empty($Type2)) {$Type2 = "/";}

						$SQLTypeRequest = $db->prepare ("SELECT * FROM Pokemon p JOIN EtreType e ON p.PKMN_ID  = e.PKMN_ID
																				JOIN Types t    ON e.Types_ID = t.Types_ID
														WHERE 	p.PKMN_ID = '$ID_Random'                      ;");
						$SQLTypeRequest -> execute();
						$TypeRequest = $SQLTypeRequest-> fetchAll ();

						$cpt = 0;

						$Type1_Random = null;
						$Type2_Random = null;

						foreach ($TypeRequest as $TypeRequest) 
						{
							if 		($cpt == 0) 	{$Type1_Random = $TypeRequest['Types_Nom_FR'];}
							else				    {$Type2_Random = $TypeRequest['Types_Nom_FR'];}
							
							$cpt++;
						}

						if (empty($Type2_Random)) {$Type2_Random = "/";}
	

						if ($Pokemons == $_SESSION['PKMN_Random']) { $victoire = true; } else { $victoire = false; }


						if ($victoire)                                                                   {$PKMN_Boolean     =  "'bon'";} else {$PKMN_Boolean      = "'pasBon'";}
						if ($Type1                       == $Type1_Random                               ){$Type1Boolean      = "'bon'";} else {$Type1Boolean      = "'pasBon'";}
						if ($Type2                       == $Type2_Random                               ){$Type2Boolean      = "'bon'";} else {$Type2Boolean      = "'pasBon'";}
						if ($Pokemons['PKMN_Taille'    ] == $_SESSION['PKMN_Random']['PKMN_Taille'    ]) {$TailleBoolean     = "'bon'";} else {$TailleBoolean     = "'pasBon'";}
						if ($Pokemons['PKMN_Poids'     ] == $_SESSION['PKMN_Random']['PKMN_Poids'     ]) {$PoidsBoolean      = "'bon'";} else {$PoidsBoolean      = "'pasBon'";}
						if ($Pokemons['PKMN_Couleur'   ] == $_SESSION['PKMN_Random']['PKMN_Couleur'   ]) {$CouleurBoolean    = "'bon'";} else {$CouleurBoolean    = "'pasBon'";}
						if ($Pokemons['PKMN_Evolution' ] == $_SESSION['PKMN_Random']['PKMN_Evolution' ]) {$EvolutionBoolean  = "'bon'";} else {$EvolutionBoolean  = "'pasBon'";}

						if ($Pokemons == $_SESSION['PKMN_Random']) { $victoire == true;}
	
					

						echo
						"
							<tr>
								<td class =",$PKMN_Boolean     ,"><img src='img_pokemon/", $Pokemons["PKMN_ID"] ,".png'></td>
								<td class =",$Type1Boolean     ,">", $Type1                    ,"</td>
								<td class =",$Type1Boolean     ,">", $Type2                    ,"</td>
								<td class =",$TailleBoolean    ,">", $Pokemons['PKMN_Taille' ] ,"</td>
								<td class =",$PoidsBoolean     ,">", $Pokemons['PKMN_Poids'  ] ,"</td>
								<td class =",$CouleurBoolean   ,">", $Pokemons['PKMN_Couleur'] ,"</td>
								<td class =",$EvolutionBoolean ,">", $evolution                ,"</td>
								
							</tr>
						";
					}
				
				}
			}
			}

			
		?>

	</table>

	<?php

		if ($victoire) {echo "<p class = 'victoire'> Bien joué <br> Vous avez gagné en ", $_SESSION['NB_Essais'] ," coups ! </p>";}

	?>

	<a href="https://www.youtube.com/watch?v=RVdZs8Vh0O0"><img src="img_pokemon/Pikachu.png" alt="Pikachu"></a>
</body>


<footer>
	<p><a class="ilo" href="https://www.youtube.com/watch?v=y8p0BxMykqg">© </a> 2023 par Justine BONDU, Alizéa LEBARON, Marc DUFOUR, Ashanti NJANJA</p>
</footer>

</html>