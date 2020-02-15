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
     * @param {Object} contentObj
     * @return {Object} menuItemEl list item DOM object
     */
    static createMenuItem(contentObj) {
        let menuItemEl = document.createElement('li');
        menuItemEl.appendChild(Helpers.createLink(contentObj));
        return menuItemEl;
    }

    /**
     * Create link
     *
     * @param  {Object} contentObj Page or post object to create link for
     * @return {Object} linkEl Link object
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

    /**
     * Gets the editor element in the DOM
     * @return {Object} Main editor DOM object
     */
    static getEditorEl() {
        return document.getElementById('editor');
    }

    /**
     * Gets the editor toggle element in the DOM
     * @return {Object} Main editor DOM object
     */
    static getEditorToggleEl() {
        return document.getElementById('editorToggle');
    }

    /**
     * Gets editor title field element
     * @return {Object} Title field
     */
    static getEditorTitleEl() {
        return document.getElementById('editTitle');
    }

    /**
     * Gets editor content field element
     * @return {Object} Content field
     */
    static getEditorContentEl() {
        return document.getElementById('editContent');
    }

    /**
     * Gets editor update button
     * @return {Object} update button object
     */
    static getEditorUpdateButtonEl() {
        return document.getElementById('editUpdateBtn');
    }

    /**
     * Get all links in page
     * @return {object[]} All link elements
     */
    static getLinks() {
        return document.querySelectorAll('a');
    }

}

//to test returns of helpers object methods
/*console.log(helpers.getPageContentEl());;
console.log(helpers.getPageTitleEl());;*/
