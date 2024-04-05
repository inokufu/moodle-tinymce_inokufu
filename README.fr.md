# Inokufu Search - Moodle TinyMCE Plugin

Le plugin Inokufu Search - Plugin TinyMCE Moodle fait partie de l'ensemble des plugins Moodle Inokufu Search, qui inclut également le plugin Inokufu Search - Plugin Dépôt Moodle. Ce plugin TinyMCE Moodle simplifie l'interaction avec le plugin Inokufu Search - Plugin Dépôt Moodle, en permettant aux utilisateurs d'intégrer du contenu provenant des Dépôt Moodle directement dans l'éditeur de texte TinyMCE.
Ce document vous guidera à travers l'installation et l'utilisation du plugin.

**Note :** Ce plugin Moodle n'est utile que lorsqu'il est combiné avec notre plugin `Inokufu Search - Plugin Dépôt Moodle`. Assurez-vous de l'avoir installé et configuré avant d'installer ce plugin.

## Installation

### Installation à partir d'un ZIP
1. Téléchargez le fichier zip du plugin à partir de ce dépôt GitHub.
2. Connectez-vous à votre site Moodle en tant qu'administrateur.
3. Accédez à `Administration du site > Plugins > Installer des plugins`.
4. Téléversez le fichier zip que vous avez téléchargé à partir de ce dépôt GitHub et suivez les instructions à l'écran.
5. Remplissez et confirmez les formulaires pour terminer l'installation du plugin.

### Installation à partir des sources
1. Établissez une connexion SSH à votre instance Moodle.
2. Clonez les fichiers source à partir de ce dépôt GitHub directement dans vos fichiers source Moodle.
3. Renommez le dossier cloné en `inokufu`.
4. Déplacez le dossier `inokufu` dans le dossier `lib/editor/tiny/plugins` de votre installation Moodle. Assurez-vous que le dossier du plugin est nommé `inokufu`.
5. Connectez-vous à votre site Moodle en tant qu'administrateur.
6. Accédez à `Administration du site > Notifications` pour finaliser l'installation du plugin.

## Utilisation
1. Pour ajouter un nouvel Objet d'Apprentissage à vos Cours Moodle, accédez au cours souhaité et activez le mode édition.
2. Ajoutez ou modifiez une activité ou une ressource de votre cours.
3. Dans la barre d'outils de l'éditeur de texte TinyMCE, vous trouverez un onglet Inokufu ; cliquez dessus pour ouvrir vos Dépôts Moodle, puis sélectionnez `Recherche Inokufu` dans le panneau de gauche pour ouvrir notre plugin de Dépôt.
4. Remplissez votre requête en saisissant votre requête texte et en modifiant les filtres par défaut si nécessaire. Lancez la recherche en cliquant sur le bouton `Rechercher`.
5. Une liste d'Objets d'Apprentissage devrait apparaître ; sélectionnez l'Objet d'Apprentissage souhaité en cliquant dessus. Cliquez sur "sélectionner ce fichier" pour confirmer votre choix.
6. Enregistrez et affichez l'activité ou la ressource. Vos étudiants peuvent désormais accéder au contenu de l'Objet d'Apprentissage en cliquant dessus.

**Note :** Ce cas d'utilisation n'est possible que si vous avez déjà installé notre plugin `Inokufu Search - Plugin Dépôt Moodle`.

## Résolution des problèmes
Si vous rencontrez des problèmes avec le plugin, veuillez vérifier les points suivants :
1. Assurez-vous que votre site Moodle répond aux exigences minimales pour le plugin.
2. Vérifiez que votre clé API est correctement remplie et valide.
3. Consultez le journal Moodle (`Administration du site > Rapports > Journaux`) pour voir s'il y a des messages d'erreur liés au plugin.
4. Si aucune de ces étapes ne vous a aidé, n'hésitez pas à contacter notre [Support Inokufu](https://support.inokufu.com/).

## Support
Pour obtenir une assistance supplémentaire ou signaler un bug, veuillez visiter le dépôt GitHub du plugin et ouvrir une `issue`. Veillez à inclure tous les détails pertinents, tels que la version de votre Moodle, la version du plugin et une description détaillée du problème.