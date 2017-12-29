---
layout: default
---

# Réservation des salles

Le système de réservation de salle de réunion fonctionne avec l'extension Formidable, et la vue "agenda".

La page qui affiche les réservations:
https://coworking-neuchatel.ch/reservation-salle-de-reunion/

Limitation des accès à cette page: la page utilise [le modèle "Login"](https://github.com/ms-studio/cowork15/blob/master/themes/cowork15/page-templates/full-width-login.php). La condition est: is_user_logged_in().

La page qui permet de faire une réservation:
https://coworking-neuchatel.ch/reserver-salle-de-reunion/

La page qui permet de modifier ses réservations:
https://coworking-neuchatel.ch/modifier-vos-reservations/

***

## Lien vers ces pages (Navigation Membres):

Le lien figure dans un menu visible uniquement pour les membres du coworking.

Ce menu est produit dans le template header.php

Il vérifie d'abord si l'utilisateur est connecté.
Ensuite, il récupère le champ ACF 'cowork_site', qui est enregistré comme option-utilisateur.

Historiquement:

* le menu 'membres_neuch' était affiché pour le site Neuchâtel.
* le menu 'membres_tchaux' pour utilisateurs CdF.
* le menu 'membres_global' pour utilisateurs des deux sites.

Changement décembre 2017: temporairement, pour simplifier, on affiche le menu 'membres_neuch' pour tous membres du site. Voir [issue #4](https://github.com/ms-studio/cowork15/issues/4).

Code historique: 

```
if ( function_exists( 'get_field' ) ) {
			
  $user_ID = get_current_user_id();
  $cwrk_sites = get_field('cowork_site', 'user_'.$user_ID);
				
} // end if-fuction exists
```