"use strict";
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

}

//to test returns of helpers object methods
/*console.log(helpers.getPageContentEl());;
console.log(helpers.getPageTitleEl());;*/
