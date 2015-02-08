<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Application\Responder;
use Test\Configuration\DemoUseCaseFactory;

DemoUseCaseFactory::setUp ();

$request = json_decode ( file_get_contents ( 'php://input' ) );

$useCaseName = $request->useCaseName;
$transactionName = $request->transactionName;
$args = ( object ) $request->args;

$responder = new Responder ();
$useCaseFactory = new DemoUseCaseFactory ();
$useCase = $useCaseFactory->makeUseCase ( $useCaseName );

$useCase->execute ( $transactionName, $args, $responder );

header ( 'Content-type: application/json' );
echo json_encode ( $responder->actions );
