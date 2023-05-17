# Quel est-ce pokémon ?

Mesdames et messieurs, 
bonjour et bienvenue dans ce premier projet docker.
Aujourd'hui, nous avons crée un site s'inspirant du jeu "Who's that pokemon ?".
Le principe est simple. On doit deviner quel pokemon a été choisi aléatoire.
Nous avons repris ce principe mais nous devons desormais devinez le pokemon en fonction de ses cractéristiques. 

## Installation de docker

Voici comment proceder a l'instalation :

1 - Dans un premier temps, recupérer les dossiers depuis le github via un invite de commande.

Dans cette invite de commande, mettez vous dans le fichier desirez.
`git clone git@github.com:astyell/docker-sae203.git`


2 - Ensuite, ouvrez un terminal là où vous avez placer les fichiers télécharger précédemment.

Dans votre terminal, vous pourrez écrire la ligne de commande suivante :
`docker-compose up --build`

Cela vous permettra de créer les images MySQL et php de notre projet ainsi que votre premier contenaire !

3 - Vous rendre sur le site de notre projet

Pour éviter tout problèmes quand aux différents ports, nous avons décidez de mettre notre projet sur le port `8800`.
Pour vous rendre sur le site, tapez dans la barre de recherche de votre navigateur le lien suivant : `localhost:8800`

4 - Détruire le contenaire

Tapez la commande suivante : `docker ps`

Récuperer ensuite l'id du conteneur.

`docker stop [id_conteneur]`

`ocker --rm [id_conteneur]`

S jamais ces options ne fonctionnes pas, ouvrez un nouvel invite de commande et réessayez

durant l'exution de notre programme, nous vous souhaitons un bon jeu, et n'hésitez pas a consultez le résultats de la base de données situé sur  l'onglet "tableau pokemon"

Pour des raisons de test, nous avons laisser le pokemon à trouver en haut gauche du site internet.
Cela vous faciliteras les tests tout comme il cela nous les a simplifiés





