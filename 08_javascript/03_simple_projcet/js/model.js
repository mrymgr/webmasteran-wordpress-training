'use strict';

/**
 * Model file for working with data
 * */

/**
 * Main Model class
 *
 * @see https://googlechrome.github.io/samples/classes-es6/
 * @property string    {modelName} Name of model object
 * @property array {posts} Array of posts for model object
 * */
class Model {

    /**
     * class constructor method
     */
    constructor() {
        this.modelName = 'gholamPress';
        this.posts = this.getLocalStore().posts;
        this.pages = this.getLocalStore().pages;
    }

    /**
     * Init model object in app
     *
     */
    init() {
        if (null === localStorage.getItem(this.modelName)) {
            this.updateLocalStore(data);
        }
        this.posts = this.getLocalStore().posts;
        this.pages = this.getLocalStore().pages;
        //this.removeLocalStore();
    }

    /**
     * Gets posts from local store
     *
     * @return {array} posts  An array of post objects
     */
    getPosts() {
        //let posts = this.getLocalStore();
        return this.posts;
    }

    /**
     * Get a single post based on URL
     *
     * @param {String} slug  The slug for the Post
     * @return {Object} post  Single post object
     */
    getPost(slug) {
        for (let i = 0, max = this.posts.length; i < max; i++) {
            if (slug === this.posts[i].slug) {
                return this.posts[i];
            }
        }
        return null;

    }

    /**
     * Gets pages from local store
     *
     * @return {array} pages  An array of page objects
     */
    getPages() {
        return this.pages;
    }

    /**
     * Get a page based on URL
     *
     * @param {String} slug  The slug for the page
     * @return {Object} page  Single page object
     */
    getPage(slug) {
        for (let i = 0, max = this.pages.length; i < max; i++) {
            if (slug === this.pages[i].slug) {
                return this.pages[i];
            }
        }
        return null;

    }

    /**
     * Get a single post or page based on url slug
     *
     * @param {String} slug The slug for a post or page
     * @return {Object} contentObj Single post or page
     */
    getContent(slug) {
        let contentObj = this.getPost(slug);
        if (null === contentObj) {
            contentObj = model.getPage(slug);
        }

        if (null === contentObj) {
            contentObj = {
                title: '404 Error',
                content: 'Content not found in this site!!!'
            }
        }
        return contentObj;
    }

    /**
     * Get a single post or page based on the current url
     *
     * @return {Object} contentObj single post or page
     */
    getCurrentContent() {
        let slug = router.getSlug();
        if (null === slug) {
            slug = 'home'
        }

        return this.getContent(slug);
    }

    /**
     * Gets content from local store
     *
     * @return {Object} store  object or array of object of site data
     */
    getLocalStore() {
        return JSON.parse(localStorage.getItem(this.modelName));
    }

    /**
     * Save temporary store to local storage
     *
     * @param {String} store  JSON string of data to store
     */
    updateLocalStore(store) {

        localStorage.setItem(this.modelName, JSON.stringify(store));
    }

    /**
     * Update post or page in local storage
     *
     * @param {Object} contentObj Content object to update
     */
    updateContent(contentObj) {
        let store = this.getLocalStore(),
            date = new Date();
        if ('post' === contentObj.type) {
            store = this.updateTempStore(store, 'posts', contentObj, date);
        } else {
            store = this.updateTempStore(store, 'pages', contentObj, date);
        }
        console.log(store);
        this.updateLocalStore(store);

    }

    /**
     * Update store temporary
     *
     * @param {Object} store Local storage contents of posts and pages
     * @param {Object} type object of page
     * @param {Object} contentObj content Object
     * @param {Object} date date Object
     * @return {Object} Object of posts and pages
     */
    updateTempStore(store, type, contentObj, date) {
        store[type].forEach(function (content) {
            if (content.id === contentObj.id) {
                content.title = contentObj.title;
                content.content = contentObj.content;
                content.modified = date.toISOString();
            }
        });
        return store;
    }

    /**
     * Delete data from local store
     *
     */
    removeLocalStore() {
        localStorage.removeItem(this.modelName);
    }

}

let model = new Model();



