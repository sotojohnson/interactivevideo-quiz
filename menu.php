<?php
$instructorMenu = array(
    '' => 'View All Results'
);
$studentMenu = array(
    'index.php' => 'Study Mode',
    '' => 'Results'
);

if($USER->instructor) {
    $menu = $instructorMenu;
} else {
    $menu = $studentMenu;
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Interactive Video</a>
        </div>
        <ul class="nav navbar-nav">
            <?php foreach( $menu as $menupage => $menulabel ) : ?>
                <li<?php if($menupage == basename($_SERVER['PHP_SELF'])){echo ' class="active"';} ?>>
                    <a href="<?php echo $menupage ; ?>">
                        <?php echo $menulabel ; ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>
