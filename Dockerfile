# Utilisation de l'image officielle PHP comme base
FROM php:8.2-apache

# Activer les modules nécessaires (par exemple, mod_rewrite pour Apache)
RUN a2enmod rewrite

# Installer les extensions PHP nécessaires (si besoin)
RUN docker-php-ext-install pdo pdo_mysql

# Copier tous les fichiers du projet dans le répertoire /var/www/html
COPY . /var/www/html/

# Configurer le répertoire de travail Apache
WORKDIR /var/www/html

# Exposer le port 80 pour accéder à l'application
EXPOSE 80

# Démarrer Apache en mode foreground
CMD ["apache2-foreground"]
