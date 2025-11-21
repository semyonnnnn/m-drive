<?php

namespace App\Core;

class OldRouter
{
    // Detect AJAX request

    public function __construct()
    {
        $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($isAjax) {
            // Return only the page content, no head, body, header/footer
            $page = $_SERVER['REQUEST_URI'] === '/contacts' ? 'contacts' : 'about';
            include _file("pages/$page");
            exit; // stop execution here for AJAX
        } else {
            include _file('/pages/main');
        }
    }
}