"use strict";
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
class Model{

    /**
     * class constructor method
     */
    constructor() {
        this.modelName = 'gholamPress';
        this.posts = [];
    }

    /**
     * Init model object in app
     *
     */
    init() {
        this.updateLocalStore(jsonData);
        this.posts = this.getLocalStore();
        //this.removeLocalStore();
    }

    /**
     * Gets posts from local store
     *
     * @return posts {array} An array of post objects
     */
    getPosts() {
        //let posts = this.getLocalStore();
        return this.posts;
    }

    /**
     * Gets content from local store
     *
     * @return store {object} object or array of object of site data
     */
    getLocalStore() {
        return JSON.parse(localStorage.getItem(this.modelName));
    }

    /**
     * Save temporary store to local storage
     *
     * @param store {string} JSON string of data to store
     */
    updateLocalStore(store) {
        localStorage.setItem(this.modelName, store);
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



