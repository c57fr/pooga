# AutoMenu (AM)

Script à vocation pédagogique uniquement.
Facilite la création de nouvelles page pour tests divers isolés.

Nécessite **PHP 7.1+** et X-debug installé (Recommandé)

## Capture d'écran

### En action (*Live*):

![gg](aGc7/AutoMenu/demos/demoAM1.gif)

### Statique

![gg](aGc7/AutoMenu/demos/demoAM2.png)

## Guide d'installation rapide

1. ***Fork*** le projet 
  
      *(Cf. en haut à droite dans la page d'accueil du projet sur Github)*
2. Clôner VOTRE copie du projet

```ini
[en mode console, dans le dossier de votre virtual localhost : ]
git clone URL_de_votre_dépôt_GitHub_de_POOGA
```

3. Dans le dossier pooga/, installer les dépendances

```ini
composer update
```

4. Réaliser toutes modifications, corrections, améliorations, etc... souhaitées

5. Demander une fusion (= Effectuer un ***Merge Request***)

NB: Outils conseillés: 

- Sous Win, **Laragon**, Xampp sous Linux & MLac
- **[ungit](https://github.com/FredrikNoren/ungit)** (Intégré facilement dans les éditeurs Brackets ou **Visual Studio Code** grâce à leurs plugins respectifs)
- **[GitKraken / Glo](https://www.gitkraken.com/)**

Penser à y ajouter ce dépôt, **AutoMenu** pour synchroniser facilement votre dépôt (Ex. dans Ungit: ***Add Remote*** et l'URL de ce dépôt)

1. [Aide ou Signaler un Bug](https://github.com/c57fr/pooga/issues/new)

## Pour AutoMenu

### IMPORTANT :

### Toujours conserver au minimum, les dossiers aGc7/, blog/ et Tests/ ainsi que les fichiers à la racine

Les autre dossiers indispensables seront mis à jour avec : 

```ini
[node_modules/]
npm update
```

```ini
[vendor/]
composer update
```

### Pour aisément et rapidement naviguer dans vos scripts pour tests :

1. Créer votre propre dossier dont le menu sera automatique, visiter l'admin (Lien en haut à droite)

2. Ensuite, simplement créer un dossier avec le nom de votre choix dans celui-ci et y placer un fichier 'index.php'blog

    Ce dossier apparaîtra automatiquement comme point de menu de votre nouveau service

Pour supprimer un de vos dossiers, simplement le supprimer 'en vrai', avec votre gestionnaire de dossiers habituel.

  Pour lancer le serveur

```ini
[Dans le dossier AM]
Gulp
```

## Contenu:

- Blog (Tuto **POO G**rafik**A**rt): Pour avoir le contenu des pages nécessiatant la Base de donnée, importer la Base de Données
  /blog/config/**pooga.sql**
- Un dossier d'exemples 'Divers'
- Rubriques 'DP' (Design Patterns)
  - Création
  - Structurels
  - Comportementals
- Interfaces
- Traits
- Tests (Unitaires, avec Kahlan)
- GArtiens (Échanges entre membres)

## App pour dev en local exclusivement
Recommandé : Faire un virtual host : [pooga](http://POOGA)

(Automatique sous Windows avec Laragon)
