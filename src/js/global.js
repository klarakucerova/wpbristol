'use strict';

( function( $ ) {
    var $navToggle = $('.nav-toggle'),
        $navLink = $('.menu li a'),
        $navContent = $('.top-navigation'),
        $accordion = $('.accordion'),
        $accordionTrigger = $('.accordion-trigger'),
        $accordionItem = $('.accordion-item'),
        $accordionOverlay = $('.accordion-overlay');

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

    function closeAccordion(event) {
        $accordion.removeClass('active');
        $accordionItem.removeClass('active');
    }

    function openAccordion(event) {
         if($(event.target).is('.active')) {
            closeAccordion();
        }
        else {
            $accordion.toggleClass('active');
            $(this).closest('.accordion-item').toggleClass('active');
        }
    }

} )( jQuery );
