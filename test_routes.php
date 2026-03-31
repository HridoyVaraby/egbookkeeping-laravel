<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = [
    '/',
    '/about',
    '/blog',
    '/contact',
    '/pricing',
    '/services',
    '/legal/cancellation-refund',
    '/legal/privacy-policy',
    '/legal/terms-conditions',
    '/sitemap.xml'
];

$allPassed = true;
foreach($routes as $route) {
    $request = Illuminate\Http\Request::create($route, 'GET');
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    
    if($status === 200) {
        echo "[✅] 200 OK - $route\n";
    } else {
        echo "[❌] $status ERROR - $route\n";
        $allPassed = false;
        if($status === 500) {
            file_put_contents('route_error.html', $response->getContent());
            echo "     --> See route_error.html for details\n";
        }
    }
}
exit($allPassed ? 0 : 1);
