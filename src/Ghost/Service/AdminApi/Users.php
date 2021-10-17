<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Service\AdminApi;

class Users extends AdminApi
{
    use AdminApi\_\Entity;

    const SERVICE_KEY = 'users';
    const BASE_URL = '{url}/ghost/api/{version}/admin/users{path}';
}