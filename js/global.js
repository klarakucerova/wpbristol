'use strict';

( function( $ ) {
    var $navToggle = $('.nav-toggle'),
        $navLink = $('.menu li a'),
        $navContent = $('.navigation'),
        $accordionTrigger = $('.accordion-trigger'),
        $accordionOverlay = $('.accordion-trigger'),
        $accordionContent = $('.accordion-overlay');

    $navToggle.on('click', openNavigation);

    $navLink.on('click', function(){
        $navToggle.removeClass('is-active');
        $navContent.removeClass('is-opened');
        $navToggle.attr('checked', false);
    });

    $accordionTrigger.on('click', openAccordion);

    function openNavigation() {
        $(this).toggleClass('is-active');
        $navContent.toggleClass('is-opened');
    }

    function openAccordion(event) {
        var organiserId = $(this).data('organiser-id');

        $(this).toggleClass('is-active');
        $(this).closest('.organiser-item').toggleClass('active');
        $(this).closest('.accordion').toggleClass('active');
        $(this).closest('.organiser-item').find('.accordion-content').toggleClass('is-opened');
    }

} )( jQuery );