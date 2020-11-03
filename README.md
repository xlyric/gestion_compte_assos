# gestion_compte_assos
site pour gerer les comptes d'une assos ou d'une petite société par interface web
fait par Cyril Poissonnier @2020


# installation 
L'installation se fait par clone du git vers un répertoire du site, 
il faut ensuite installer la base de donnée avec les tables 
et configurer le fichier .env avec les informations de connexion

dans config/package/twig.yaml
il est possible de changer le nom de l'association ( clé ga_societe ) 

la fin de l'installation se fait par composer 
- composer install 

le login et mdp par défaut sont demo/demo 

il est conseillé de changer la clé de salage dans .env

# .htaccess

il est conseillé de créer ou modifier le .htaccess pour faire fonctionner l'application


``` 
<IfModule mod_rewrite.c>
   Options -MultiViews
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ public/index.php [QSA,L]
  </IfModule>

<IfModule !mod_rewrite.c>
    <IfModule mod_alias.c>
        RedirectMatch 302 ^/$ public/index.php/
    </IfModule>
 </IfModule>

```
