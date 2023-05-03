Mesdames et messieurs, 
bonjour et bienvenue dans ce premier projet docker.
Aujourd'hui, nous avons crée un site s'inspirant du jeu "Who's that pokemon ?".
Le principe est simple. Une ombre d'un pokemon apparaît et on doit deviner a quel pokemon elle appartient.
Nous avons repris ce principe mais nous devons desormais devinez le pokemon en fonction en fonction de ses statistiques. 

Voici comment proceder a l'instalation :

Dans un premier temps, recupérer les dossier depuis le github via un invite de commande.

Dans cette invite de commande, mettez vous dans le fichier desirez.

git clone git@github.com:<votre_utilisateur>/docker-sae203.git

Une fois les fichiers recupérer, vous pourrez lancer les fichiers 

PKMN_creation.sql puis PKMN_insertion.sql

une fois cela fais, nous aurons besoin de mettre les fichiers pour le site sous conteneurs

pour cela, il faudras executer la commande suivante : 

$ docker  run -p 8080:8080 --name conteneur-php-groupe-09 --rm -v $(pwd):$(pwd) php:7.4-cli php -S 0.0.0.0:8080  $(pwd)/index.php

vous pourrez ensuite acceder au site en tappant dans votre navigateur

localhost:8080

Pour detruire le conteneur :

docker ps

recuperer ensuite l'id du conteneur

docker stop [id_conteneur]

docker --rm [id_conteneur]

si jamais ces options ne fonctionnes pas, ouvrez un nouvel invite de commande et réessayez

durant l'exution de notre programme, nous vous souhaitons un bon jeu, et n'hésitez pas a consultez le résultats de la base de données situé sur  l'onglet "tableau pokemon"

Pour des raisons de test, nous avons laisser le pokemon à trouver en haut gauche du site internet.
Cela vous faciliteras les tests tout comme il cela nous les a simplifiés





