<?php
// --------------------------------------------------------------------------------
// [ INIT ] ****************************

// CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Methods: PUT, DELETE'); // Specify allowed methods
    header('Access-Control-Allow-Credentials: true');
    
    // Check if the request includes additional headers and include them in the response
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header('Access-Control-Allow-Headers: ' . $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
    }

    exit; // Stop further execution
}

// For regular requests
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json; charset=UTF-8');

// Error Handling
error_reporting(-1);
ini_set('display_errors', 1);


// Initial files
require __DIR__ . '/vendor/autoload.php'; // Classes Autoloader.
require __DIR__ . '/app/config/config.php'; // Initial configs.

// Use of initial libraries
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Model\Utilities\Log;
use Slim\Psr7\NonBufferedBody;

// Instantiating of the App
$app = AppFactory::create();

// Error middleware
$errorMiddleware = function ($request, $exception, $displayErrorDetails) use ($app)
{
    $statusCode = 500;
    $errorMessage = $exception->getMessage();
    $requestedUrl = $request->getUri()->getPath();
    $httpMethod = $request->getMethod();
    
    $response = $app->getResponseFactory()->createResponse($statusCode);
    $response->getBody()->write(json_encode(['error' => $errorMessage]));
    
    $trace = $exception->getTrace();
    $errorFile = $trace[0]['file'] ?? 'unknown';
    $errorLine = $trace[0]['line'] ?? 'unknown';
    
    $logMessage = "Error: " . $errorMessage . "\n" . " (METHOD: " . $httpMethod . ", URL: " . $requestedUrl . ", FILE: " . $errorFile . ", LINE: " . $errorLine . ")";
    Log::WriteLog('index_error.txt', $logMessage);
    return $response->withHeader('Content-Type', 'application/json');
};


// Add error middleware
$app->addErrorMiddleware(true, true, true)->setDefaultErrorHandler($errorMiddleware);

// Add parse body
$app->addBodyParsingMiddleware();

// --------------------------------------------------------------------------------
// [ SERVER ] ****************************

/////////////////////////////////////////////////////////////
#region - - - TEST ROUTES - - -

$app->get('/test', function (Request $request, Response $response)
{    
    $payload = json_encode(array('method' => 'GET', 'msg' => "GET /test working (.htacces file is present). - - - RPG PROJECT"));
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/test_browser', function (Request $request, Response $response)
{
    $payload = json_encode($_SERVER['HTTP_USER_AGENT']);
    $response->getBody()->write($payload);
    return $response->withHeader('Content-Type', 'application/json');
});
#endregion

/////////////////////////////////////////////////////////////
#region - - - PUBLIC ROUTES - - -

$app->get('/app_name', function(Request $request, Response $response)
{
    $payload = 'Test EventSource';
    $response->getBody()->write(json_encode(['response' => $payload]));        
    return $response->withStatus(200);
});
#endregion

$app->get('/event_one', \Model\Services\Manager::class . '::ReturnTime');

$app->get('/event_two', \Model\Services\Manager::class . '::ReturnSaraza');

$app->run();

?>