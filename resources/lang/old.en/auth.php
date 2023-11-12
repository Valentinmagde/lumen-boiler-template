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

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'invalidToken' => "Token is Invalid",
    'expiredToken' => "Token is Expired",
    'blacklistedToken' => "Token is Blacklisted",
    'tokenNotFound' => "Authorization Token not found",
    'theMethod' => "The method",
    'isNotSupportedForThisRoute' => "is not supported for this route. Supported methods:",
    'ressourceNotFound' => "Ressource not found",
    'cantConnectToLocalMySQL' => "Can't connect to local MySQL server",
    'cantConnectToMySQLServer' => "Can't connect to MySQL server",
    'unknownMySQLHost' => "Unknown MySQL server host",
    'mySQLServerGoneAway' => "MySQL server has gone away",
    'mySQLRanOutMemory' => "MySQL client ran out of memory",
    'lostConnectionToMySQLQuery' => "Lost connection to MySQL server during query",
    'unknownMySQLError' => "Unknown MySQL error",

    'login' => [
        "incorrectUserEmailOrPassword" => "Incorrect user email or password",
    ],
    'register' => [
        "userWasSuccessfullyCreated" => "User was successfully created",
    ],
    'show' => [
        "successfulOperation" => "Successful operation"
    ],
    'update' => [
        "userNotExist" => "This user does not exist",
        "userUpdatedSuccessfully" => "User updated successfully"
    ],
    'logout' => [
        "successfullyLoggedOut" => "Successfully logged out"
    ]
];
