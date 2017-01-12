# E-Lycee
Projet de fin d'année CPDEV-12

Commencez par configurer le .env avec votre nom de base de donnée et votre duo identifiants / mot de passe de celle ci.

Ensuite dans la console exécutez la commande : $ composer install
Lorsque cela est terminé, exécutez la commande : $ php artisan migrate --seed
Vous avez maintenant un site déployé, pour le faire fonctionner exécutez la commande : $ php artisan serve
et rendez vous sur l'adresse indiquée (ex : localhost:8000);


Les identifiants sont en base et tout les mots de passe sont "soleil"

"Alexandre" est le professeur

"Corentin" est un étudiant en Terminale



Bonus : Pour mettre en place l'environnement de DEV, exécutez la commande : $ npm install

Il est nécessaire d'avoir un environnement qui supporte GULP et browser-sync, il vous suffira ensuite d'exécuter la commande : $ gulp

Elle remplace entièrement la commande : $ php artisan serve

La nouvelle adresse pour se rendre sur le site sera celle du V-Host "e-lycee"