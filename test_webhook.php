<?php

/* 
Scenario:
An item has been created in an application (Projects) in Podio: https://podio.com/wauco/test

A webhook script to handle the follow cases is needed: 

1. when an item is created, set "Category" to "New" 
2. when an item is updated and "Category" is set to "OK", create a new item in the Milestones app and relate it to the Project item
3. (bonus) when a Milestone item is created, add the current datetime to a new line in a multi line text field called "Log" in the related Project item (create the field it if it doesn't exist) 

See http://podio.github.io/podio-php/ and http://developers.podio.com/doc for documentation.

This example is PHP, you are free to use any language you prefer (for example JavaScript).
Good luck!
*/

// Podio API Setup (This is a dummy code, so Podio library and config is not included)
require_once('config.php');
require_once('PodioAPI.php');

//Credentials defined in config.php
Podio::setup(CLIENT_ID, CLIENT_SECRET);
Podio::authenticate_with_app(PROJECTS_ID, PROJECTS_TOKEN); 
$projects_Items = PodioItem::filter(PROJECTS_ID);

if(count($_POST) > 0){

	switch ($_POST['type']) {
		case 'hook.verify':
			// Validate the webhook
			PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));
			break;
		case 'item.create':
			PodioItem::create(PROJECTS_ID, array('fields' => array(
			  "title" => "New project item",
                          "category"=> "New"  
			)));	
			break;
		case 'item.update':
			PodioItem::update($_POST['item_id'], array('fields' => array(
			  "category" => "Ok"
			)));
			
			$item = PodioItem::get($_POST['item_id']);
                        
			// connet to milestones
                        Podio::authenticate_with_app(MILESTONES_ID, MILESTONES_TOKEN);
                        $fields = new PodioItemFieldCollection(array(
                            new PodioTextItemField(array("external_id" => "title", "values" => array("value" => "New Milestone item"))),
                            new PodioAppItemField(array("external_id" => "project", "values" => array("value"=> "Project", "item_id" => $_POST['item_id']))
                        )));
                          
                        $milestones_item = new PodioItem(array(
                            "app" => new PodioApp(MILESTONES_ID),
                            "fields" => $fields
                        ));
                        $milestones_item->save();
			
			break;
		case 'item.delete':
		
		PodioItem::delete($_POST['item_id']);
			// Do something. item_id is available in $_POST['item_id'] 
			break;
	}
}
?>
