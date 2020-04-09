<?php

function isActive($routePath){
    return request()->path() === $routePath ? "active" : "";
}