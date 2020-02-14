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
        this.updateLocalStore(data);
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
     * Delete data from local store
     *
     */
    removeLocalStore() {
        localStorage.removeItem(this.modelName);
    }

}

var model = new Model();



