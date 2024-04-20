<?php

use core\Route;

return [
new Route('/', 'CRUDController', 'index'),
new Route('/form/create', 'CRUDController', 'create'),
new Route('/form/store', 'CRUDController', 'store'),
new Route('/form/show', 'CRUDController', 'show'),
new Route('/form/edit', 'CRUDController', 'edit'),
new Route('/form/update', 'CRUDController', 'update'),
new Route('/form/delete', 'CRUDController', 'delete'),
new Route('/api', 'APIController', 'index'),
new Route('/api/create', 'APIController', 'create'),
new Route('/test', 'TestController', 'test'),
];