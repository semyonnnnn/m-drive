<?php
include __DIR__ . "/utils/helpers.php";

// Detect AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if ($isAjax) {
    // Return only the page content, no head, body, header/footer
    $page = $_SERVER['REQUEST_URI'] === '/contacts' ? 'contacts' : 'about';
    include _file("pages/$page");
    return; // stop execution here for AJAX
}

// Full page load
include _file('partials/head');
?>

<body>
    <main id="app">
        <?php include _file('pages/main') ?>
        <section id="content">
            <?php $page = $_SERVER['REQUEST_URI'] === '/contacts' ? 'contacts' : 'about';
            include _file("pages/$page"); ?>
        </section>
    </main>

</body>

</html>