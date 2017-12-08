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

  if (strpos($output, 'mp3') > 0) {
    print '<img src="http://static.adweek.com/adweek.com-prod/wp-content/uploads/files/2016_Jul/iab-podcast-event-hed-2016.png"><br /><audio controls><source src="' . $output . '" type="audio/mpeg">Your browser does not support the audio element.</audio>'; 
  }

  if (strpos($output, 'jpg') > 0 || strpos($output, 'png') > 0 || strpos($output, 'aspx') > 0) {
    print '<a href="/post/' . $row->nid . '"><img src="' . $output . '"></a>';
  }

 ?>