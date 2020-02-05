/**
 * Model file for working with data
 * */

/**
 * Main Model Object
 * */

/**
 *
 * @type {{}}
 */
let model = {};

// noinspection JSAnnotator
/**
 * Gets posts from local store
 *
 * @return posts {array} An array of post objects
 */
model.getPost = function () {

};



/**
 * Gets content from local store
 *
 * @return store {object} object or array of object of site data
 */


/**
 * Save temporary store to local storage
 *
 * @param store {string} JSON string of data to store
 */

model.updateLocalStore = function (store) {
    localStorage.setItem('gholamPress', store);
};

/**
 * Delete data from local store
 *
 */