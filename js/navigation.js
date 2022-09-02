/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
    const HEADER_ID = 'site-header'
    const HEADER_STICKY_CLASS = 'site-header-sticky'
    const MOBILE_MENU_ID = 'site__menu-mobile';
    const MOBILE_MENU_TOGGLER_ID = 'site-header__menu-mobile__toggler';
    const MOBILE_MENU_LIST_ID = 'site-header__menu-mobile__list'
    const MOBILE_MENU_OPEN_CLASS = 'menu--open'
    const NO_SCROLL_CLASS = 'no-scroll'

    const siteNavigation = document.getElementById(MOBILE_MENU_ID);

    // Return early if the navigation doesn't exist.
    if (!siteNavigation) {
        return;
    }

    const button = document.getElementById(MOBILE_MENU_TOGGLER_ID);

    // Return early if the button doesn't exist.
    if ('undefined' === typeof button) {
        return;
    }

    const menu = document.getElementById(MOBILE_MENU_LIST_ID);

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    const html = document.getElementsByTagName('html')[0];

    // Toggle the HTML and Navigation class each time the button is clicked.
    button.addEventListener('click', function () {
        const headerHeight = document.getElementById(HEADER_ID).clientHeight;
        html.classList.toggle(NO_SCROLL_CLASS);
        siteNavigation.classList.toggle(MOBILE_MENU_OPEN_CLASS);
        siteNavigation.style.top = headerHeight + 'px';
    });

    siteNavigation.addEventListener('click', function () {
        html.classList.toggle(NO_SCROLL_CLASS);
        siteNavigation.classList.toggle(MOBILE_MENU_OPEN_CLASS);
    });

    menu.addEventListener('click', function (event) {
        event.stopPropagation();
    });
}());
