<?php
namespace Boundaries;

interface RequestBuilder {
    function build($useCaseName, $parameters);
}