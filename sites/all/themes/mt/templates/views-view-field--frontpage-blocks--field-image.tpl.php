<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php 

global $used;


  if (empty($used)) {
  	$used = array();
  }

  if (empty($output)) {
    $output = 'http://www.allfordmustangs.com/photopost/data/3817/0.jpg';
    $images = file_scan_directory('public://dummy_images', '/.*/');
    $urls = array_keys($images);
    $output = $urls[rand(0, count($images) - 1)];
    while (in_array($output, $used)) {
      $output = $urls[rand(0, count($images) - 1)];
    }
    $used[] = $output;
   
    $output = '<img src="' . file_create_url($output). '">';
    
  }
  


  print $output;
  





?>