<?php
if(!function_exists('current_route_name')) {
    function current_route_name(){
        $uri = service('uri');
        $route_name = $uri->getSegment(1);
        return $route_name;
    }
}
?>