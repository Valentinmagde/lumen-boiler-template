<?php

namespace App\Utils;

trait ApiErrorNumber
{
    public $validator = 6;
    public $bad_login_credentials = 7;
    public $invalid_token = 11;
    public $expired_token = 12;
    public $blacklisted_token = 13;
    public $token_not_found = 14;
    public $resource_not_found = 26;
    public $not_allowed_method = 31;
    public $cr_unknown_error = 251;
    public $cr_connection_error = 252;
    public $cr_conn_host_error = 253;
    public $cr_unknown_host = 254;
    public $cr_server_gone_error = 255;
    public $cr_out_of_memory = 256;
    public $cr_server_lost = 257;
    public $integrity_constraint_violation = 258;
    public $generic_error = 259;
}