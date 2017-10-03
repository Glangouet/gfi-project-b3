Projet workshop B3 pour l'ecole d'informatique EPSI de MONTPELLIER

Développer en PHP / HTML / CSS / JAVASCRIPT

à l'aide du Framework Symfony3.

Contributeur:

Maxime Egido, Jeremy Dijon, Hugo Castel-laville, Roxane Feraud, Guillaume Langouet.

Fork le projet suivant sur son propre git

https://github.com/team-workshop-epsi-montpellier-b3/gfi-project-b3.git

Une fois le projet fork tu peux récupérer l’adresse https du projet à présent disponible sur ton compte git.

Ensuite tu peux clone le projet dans le dossier de ton choix à l’aide de la commande:

git clone urlDuProjetSurTonCompte

Une fois le projet téléchargé, et un environnement de dev Mysql / PHP / Apache installé sur ta machine, tu peux lancer les commandes suivantes dans le dossier du projet en ligne de commande afin d’installer les dépendances du projet:

php composer.phar install

Symfony va vous demander de renseigner les paramètres de votre projet, renseigner les identifiants database de votre local.

php bin/console doctrine:database:create

php bin/console cache:clear


Une fois tout ceci effectué,

Pour démarrer le projet avec le serveur web natif de Symfony tu peux lancer la commande toujours au même endroit:

php bin/console server:run


Pour récupérer les données de l'upstream master sur votre propre git, vous pouvez tapper cette commande dans le dossier de votre projet:

git pull upstream master

Ensuite, il faut penser à push les données récupérées sur votre propre repo git, à l'aide de cette commande:

git push origin master


if(erreur)  appelez les pompiers !
else {
       Copier l’url que symfony te renvoi et la coller dans ton navigateur.
}

Enjoy, it works !


Initialiser son compte git :

git config --global user.email "you@example.com"

git config --global user.name "Your Name"

