<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => "Ces informations d'identification ne correspondent pas à nos dossiers.",
    'password' => 'Le mot de passe fourni est incorrect.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :seconds seconds.',
    'invalidToken' => "Le jeton est invalide",
    'expiredToken' => "Le jeton est expiré",
    'blacklistedToken' => "Le jeton est sur liste noire",
    'tokenNotFound' => "Jeton d'autorisation non trouvé",
    'theMethod' => "La méthode",
    'isNotSupportedForThisRoute' => "n'est pas prise en charge pour cet itinéraire. Méthodes prises en charge :",
    'ressourceNotFound' => "Ressource non trouvée",
    'cantConnectToLocalMySQL' => "Impossible de se connecter au serveur MySQL local",
    'cantConnectToMySQLServer' => "Impossible de se connecter au serveur MySQL",
    'unknownMySQLHost' => "Hôte inconnu du serveur MySQL",
    'mySQLServerGoneAway' => "Le serveur MySQL a disparu",
    'mySQLRanOutMemory' => "Le client MySQL a manqué de mémoire",
    'lostConnectionToMySQLQuery' => "Perte de connexion au serveur MySQL pendant une",
    'unknownMySQLError' => "Unknown MySQL error",

    'login' => [
        "incorrectUserEmailOrPassword" => "E-mail ou mot de passe incorrect",
    ],
    'register' => [
        "userWasSuccessfullyCreated" => "L'utilisateur a été créé avec succès",
    ],
    'show' => [
        "successfulOperation" => "Opération réussie"
    ],
    'update' => [
        "userNotExist" => "Cet utilisateur n'existe pas",
        "userUpdatedSuccessfully" => "L'utilisateur a été mis à jour avec succès"
    ],
    'logout' => [
        "successfullyLoggedOut" => "Déconnexion réussie"
    ]
];
