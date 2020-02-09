/**
 * Model file for working with data
 * */

/**
 * Main Model Object
 * */
let model;
model = {

    modelName: 'gholamPress',
    /**
     * Init model object in our app
     *
     */
    init: function () {
        this.updateLocalStore(jsonData);
        //console.log(this.getPosts());
        //this.removeLocalStore();
    },

    /**
     * Gets posts from local store
     *
     * @return posts {array} An array of post objects
     */
    getPosts: function () {
        let posts = this.getLocalStore();
        return posts;
    },

    /**
     * Gets content from local store
     *
     * @return store {object} object or array of object of site data
     */
    getLocalStore: function () {
        return JSON.parse(localStorage.getItem(this.modelName));
    },

    /**
     * Save temporary store to local storage
     *
     * @param store {string} JSON string of data to store
     */
    updateLocalStore: function (store) {
        localStorage.setItem(this.modelName, store);
    },

    /**
     * Delete data from local store
     *
     */
    removeLocalStore: function () {
        localStorage.removeItem(this.modelName);
    }


};


