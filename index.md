# SAE 203

## Installation de docker

Pour installer docker, il faut vous rendre sur ce lien https://docs.docker.com/get-docker/. Il ne vous reste plus qu'à choisir la version de votre choix selon votre machine. 

>  **Attention !** Lors de l'installation de docker et selon notre machine, nous avons pu rencontrer certains problèmes après l'installation. Un des premiers problèmes et simplement le fait que le noyau WSL n'était pas à jour ce qui s'arrange facilement. 

![Error kern!](https://media.discordapp.net/attachments/1095434555684560997/1095434956525809785/image.png "Erreur Kern version")

## Utilisation de docker 

Pour découvrir les possibles utilisations de docker, nous avons commencé à regarder dans notre coin ainsi qu'à l'aide des TP les différentes utilisations que l'on pouvait en faire. 
Au début, il était un peu compliqué d'appréhender le concept de docker mais avec un peu de pratique avec l'httpd, le php ou même juste ubuntu et debian nous avons compris comment nous pourrions à notre tour l'utiliser.

## Notre projet de SAE

Nous avons décidé de nous inspirer de certains jeux pour faire un "Trouvez ce Pokémon !". Le but c'est de rentrer le nom d'un Pokémon, le site va le comparer avec le Pokémon du jour et donner les informations qui changent. C'est un peu comme un motus mais qu'avec les Pokémons et leurs informations. 

Pour cela, nous allons utiliser le langage de programmation PHP ainsi que du mySQL.

### Base de données 
Pour créer notre site, nous avons utilisé une base de données.
Pour que cette base de données soit accessible depuis notre site, nous avons 2 possibilités :
    - Héberger la base de données sur un serveur externe
    - Héberger la base de données sur la machine qui lance le conteneur

Par soucis de familiarité, nous avons favoriser la machine qui lance le conteneur.

Pour éviter une surcharge de données, cette base de données référence les Pokémons de la première génération.
Nous avons préféré le fait de séparé les fichier de créations et d'insertions pour des soucis de compréhension dans le groupe.
Elle a été fait en collaboration avec tous les membres de l'équipe et reflechi pour plaire à tous.


### Le site internet

Pour crée ce site internet, nous avons utilisé de le HTML et du CSS, ainsi que du php.

#### HTML

La partie html est relié aux fichiers php.
L'HTML est présent pour donner une éstétique au site ( alliés avec le css ) ainsi qu'une aisance dans la navigation.

#### PHP

Le php nous sert à questionner la base de données dans le site internet, afin d'assurer le bon fonctionnement du programme,
Notamment grâce a l'outils PDO. Cet outil nous permet d'avoir accès à notre base de données avec des requêtes.

C'est en se bassant sur le php nous avons donc pu créer nos deux pages, la page du quizz et le Pokédex qui recense tous les Pokémons de notre base. 




