/**
 * Helper file for extra helper function
 * */

let helpers = {

    init: function () {
    },

    /**
     * get content with 'pageContent' id
     */
    getPageContentEl: function () {
        return document.getElementById('pageContent');
    },

    /**
     * get pageTitle with 'pageTitle' id
     */
    getPageTitleEl: function () {
        return document.getElementById('pageTitle');
    }
};

//to test returns of helpers object methods
/*console.log(helpers.getPageContentEl());;
console.log(helpers.getPageTitleEl());;*/
