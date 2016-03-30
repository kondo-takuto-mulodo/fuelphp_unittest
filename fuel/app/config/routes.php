<?php
return array(
  '_root_'  => 'messages/index',  // The default route
  '_404_'   => 'welcome/404',    // The main 404 route

  'messages/clone/(:id)' => array(
    array("GET",new Route('messages/new/$1')),
    array("POST",new Route('messages/create'))
  ),
  'messages/create' => array(
    array("GET",new Route('messages/new/$1')),
    array("POST",new Route('messages/create'))
   ),
  'messages/edit/(:id)' => array(
    array("GET",new Route('messages/edit/$1')),
    array("POST",new Route('messages/update/$1'))
   ),
);
