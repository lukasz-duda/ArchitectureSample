<?php
namespace Boundaries;

interface UseCaseFactory {
    function makeUseCase($useCaseName);
}