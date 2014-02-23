<?php
namespace Configuration;

interface ServiceLocator {
    function make($typeName);
} 