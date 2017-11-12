'use strict';

( function( $ ) {
    var $navToggle = $('.nav-toggle'),
        $navLink = $('.menu li a'),
        $navContent = $('.top-navigation'),
        $accordion = $('.accordion'),
        $accordionTrigger = $('.accordion-trigger'),
        $accordionOverlay = $('.accordion-overlay'),
        $accordionContent = $('.accordion-content');

    $navToggle.on('click', openNavigation);

    $navLink.on('click', function(){
        $navToggle.removeClass('is-active');
        $navContent.removeClass('is-opened');
        $navToggle.attr('checked', false);
    });

    $accordionTrigger.on('click', openAccordion);
    $accordionOverlay.on('click', closeAccordion);

    function openNavigation() {
        $(this).toggleClass('is-active');
        $navContent.toggleClass('is-opened');
    }

    function openAccordion(event) {
        $(this).toggleClass('is-active');
        $(this).closest('.organiser-item').toggleClass('active');
        $(this).closest('.accordion').toggleClass('active');
        $(this).closest('.organiser-item').find('.accordion-content').toggleClass('is-opened');
    }

    function closeAccordion(event) {
        $('.organiser-item').removeClass('active');
        $accordionTrigger.removeClass('is-active');
        $accordion.removeClass('active');
        $accordionContent.removeClass('is-opened');
    }

} )( jQuery );