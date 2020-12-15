
 - Démarche adoptée pour la réalisation du projet :

 Etape 1 : installation du dépôt en local et création du repository git en suivant le tutoriel proposé

 Etape 2 : création des fichiers de migration nécessaires au remplissage de la base de données

 Etape 3 : remplissage de ces fichiers de migration (colonnes nécessaires et clés étrangères en se référant au mcd)

 Etape 4 : ordonancement des fichiers de migration (tables sans clés étrangères, puis avec clés étrangères et enfin tables pivots)

 Etape 5 : création des fichiers models nécessaires à la mise en relation des tables de la base de données

 Etape 6 : remplissage de ces fichiers models (toujours en se référençant au mcd en respectant les relations entres les tables)

 Etape 7 : passage des tests unitaires vérifiant la bonne mise en place des fichiers de migration et des models


 - Difficultés rencontrées :

 Difficulté 1 : passage du premier fichier de tests à cause du php artisan tinker, réalisé sans respect des relations

 Difficulté 2 : relations de la table Comment à cause de la relation sur elle-même

 Difficulté 3 : passage du dernier fichier de tests concernant les règles de gestion des commentaires et des photos (problème rencontré concernant les tests 1, 3 et 5 --> ne pas créer si...)


 - Solutions mises en place :

 Solution 1 : envoi de mail au prof (vous-même qui lisez ce README.md), afin de réinitialiser le seeder avec : php artisan migrate:fresh --seed

 Solution 2 : aller voir la doc concernant les relations "BelongsTo" et les options que l'on y met ('foreign_key', 'owner_key')

 Solution 3 : demande d'aide auprès du prof + jeter un coup d'oeil sur le test déjà passé sur l'ancien projet + remplir la table pivot "PhotoUser" des méthodes photo et user car sans elles,
              on ne peut pas récupérer le group correspondant à la photo et de ce fait, la méthode "booted" ne fonctionne pas.
