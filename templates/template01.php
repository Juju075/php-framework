<?php
/**
 * @var string $childTemplate
 * @var string $form
 */
?>
<?php
    include dirname(__DIR__) . '/templates/partial/_header.php';
    include $childTemplate;
    include dirname(__DIR__) . '/templates/partial/_footer.php';
    ?>
