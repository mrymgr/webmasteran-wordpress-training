'use strict';

/**
 * Helper file for extra helper function
 * */


/**
 *
 */
class Helpers {
    init() {
    }

    /**
     * get content with 'pageContent' id
     */
    static getPageContentEl() {
        return document.getElementById('pageContent');
    }

    /**
     * get pageTitle with 'pageTitle' id
     */
    static getPageTitleEl() {
        return document.getElementById('pageTitle');
    }

    /**
     * get MainMenu element with 'mainNav' id
     */
    static getMainMenuEl() {
        return document.querySelector('#mainNav ul');
    }

    /**
     * Create a list item with a link inside for menus
     *
     * @param {object} contentObj
     * @return {object} menuItemEl list item DOM object
     */
    static createMenuItem(contentObj) {
        let menuItemEl = document.createElement('li');
        menuItemEl.appendChild(Helpers.createLink(contentObj));
        return menuItemEl;
    }

    /**
     * Create link
     *
     * @param  {object} contentObj Page or post object to create link for
     * @return {object} linkEl Link object
     */
    static createLink(contentObj) {
        let linkEl = document.createElement('a'),
            linkTitle = document.createTextNode(contentObj.title);
        linkEl.appendChild(linkTitle);
        if ('home' === contentObj.slug) {
            linkEl.href = '#'
        } else {
            linkEl.href = '#' + contentObj.slug;
        }
        return linkEl;

    }

}

//to test returns of helpers object methods
/*console.log(helpers.getPageContentEl());;
console.log(helpers.getPageTitleEl());;*/
