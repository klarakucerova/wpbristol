'use strict';

( function( $ ) {
    var $navToggle = $('.nav-toggle'),
        $navLink = $('.menu li a'),
        $navContent = $('.navigation');

    $navToggle.on('click', openNavigation);

    $navLink.on('click', function(){
        $navToggle.removeClass('is-active');
        $navContent.removeClass('is-opened');
        $navToggle.attr('checked', false);
    });

    function openNavigation() {
        $(this).toggleClass('is-active');
        $navContent.toggleClass('is-opened');
    }

} )( jQuery );