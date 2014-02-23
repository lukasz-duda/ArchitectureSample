<?php
namespace Boundaries;

interface UseCase {
	function execute($request, $responder);
}