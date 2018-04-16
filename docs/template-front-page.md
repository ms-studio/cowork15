# Le modèle Front-Page

La page d'accueil utilise le modèle "Front-page" dont le code se trouve dans: 

page-templates/front-page.php

Ce template contient un en-tête, dont le code est dans: content-hero.php ("The template used for displaying hero content in page.php and page-templates.")

C'est dans content-hero.php qu'est intégré la [zone de widgets](https://coworking-neuchatel.ch/wp-admin/widgets.php) FrontPage Gallery, permettant d'ajouter une galerie d'images (depuis décembre 2017).

Ensuite, le template front-page.php contient les sections suivantes:

1. **Bloc 1: Prestations** - fait appel à la page par son ID, [2048](https://coworking-neuchatel.ch/wp-admin/post.php?post=2048&action=edit).
2. **Bloc 2: Tarifs** - page ID [2046](https://coworking-neuchatel.ch/wp-admin/post.php?post=2046&action=edit).
3. **Bloc 3: Extensions** - page ID [2047](https://coworking-neuchatel.ch/wp-admin/post.php?post=2047&action=edit).
4. **Témoignages** (3 contenus aléatoires parmi les "testimonials").