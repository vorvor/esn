<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>

<?php 
  $node_wrapper = entity_metadata_wrapper('node', $node);
  $url = $node_wrapper->field_source->value();

  $output = '<div id="embed-header"><a href="/"><img src="/sites/all/themes/mt/header.png"></a></div>';
  $output .= '<div id="embed-back"><a href="/" class="external-content-frame-back">' . t('< Back') . '</a></div>';

  if (strpos($url, 'facebook') > 0 || strpos($url, 'totalcar.hu') > 0) {
    $output = '<script>window.location="' . $url . '"</script>';
  }
  else {
    $output .= '<iframe width="100%" height="600" src="' . $url . '"></iframe>';
  }

  print $output;


/*
<article class="<?php print $classes; ?> clearfix node-<?php print $node->nid; ?>"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || $preview || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="watermark"><?php print t('Unpublished'); ?></mark>
      <?php elseif ($preview): ?>
        <mark class="watermark"><?php print t('Preview'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>
*/
?>
