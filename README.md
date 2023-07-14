# Voici la démarche à suivre pour exécuter l'application en local  #

##  Assurez-vous d'avoir PHP, Composer et XAMPP installés sur votre machine. Voici les étapes pour vérifier leur installation  ##


  ###  Vérifier l'installation de PHP  ###
   - Ouvrez un terminal ou une ligne de commande.
   - Tapez la commande suivante : `php --version`
   - Si PHP est installé, vous verrez la version de PHP affichée à l'écran. Vérifiez que la version est égale ou supérieure à 7.3.0.
   - Si PHP n'est pas installé ou si la version est inférieure à 7.3.0, vous devrez installer une version plus récente de PHP. Vous pouvez le télécharger à partir du site officiel de PHP (https://www.php.net/downloads.php) et suivre les instructions d'installation appropriées pour votre système d'exploitation.

 ###  Vérifier l'installation de Composer  ###
   - Ouvrez un terminal ou une ligne de commande.
   - Tapez la commande suivante : `composer --version`
   - Si Composer est installé, vous verrez la version de Composer affichée à l'écran. Sinon, vous devrez installer Composer. Vous pouvez le télécharger à partir du site officiel de Composer (https://getcomposer.org/download/).
    
  ###  Installer XAMPP  ###
  - Téléchargez XAMPP à partir du site officiel (https://www.apachefriends.org/fr/index.html)
  - Choisissez la version compatible avec votre système d'exploitation.
  - Lancez le fichier d'installation téléchargé.
  - Choisissez le dossier d'installation.
  - Terminez l'installation en suivant les instructions.
  - Démarrez XAMPP et vérifiez l'état des services Apache et MySQL

  ## Ouvrez un terminal ou une ligne de commande et naviguez jusqu'au répertoire racine du projet Laravel. ##

- Exécutez la commande suivante pour installer les dépendances du projet : `composer install` 
- Renommez le fichier .env.example en .env
- Générer la clé d’application : dans le terminal, exécutez la commande suivante pour générer une clé d’application unique pour votre projet :  `php artisan key:generate
`
- Assurez-vous d'avoir correctement configuré votre fichier .env avec les informations de la base de données.
   Exemple :
    DB_CONNECTION=mysql 
    DB_HOST=127.0.0.1 
    DB_PORT=3306 
    DB_DATABASE=garage_v_parrot 
    DB_USERNAME=root 
    DB_PASSWORD=
- Exécutez la commande suivante pour exécuter les migrations et créer les tables de la base de données : `php artisan migrate`
- Exécutez la commande suivante pour exécuter les seeders et créer un administrateur pour le back-office : `php artisan db:seed`
- Vous devriez maintenant avoir un administrateur créé avec les informations suivantes :
     Nom : Vincent Parrot
     Email : vincent@garagevparrot.com
     Mot de passe : vincent@garagevparrot.com
     -> La création d'un administrateur est effectuée dans la méthode run() du fichier DatabaseSeeder.php, qui est généralement situé dans le répertoire database/seeders.
- Enfin, exécutez la commande suivante pour démarrer le serveur de développement : `php artisan serve`
- Vous pouvez maintenant accéder à l'application en ouvrant votre navigateur et en visitant l'URL `http://localhost:8000` 
   
