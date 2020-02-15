'use strict';

/**
 * Router file for managing url changes
 * */


/**
 * Main router object
 *
 */
class Router {

    constructor() {
        this.slug = window.location.hash;
    }

    /**
     * Initialized the router
     */
    init() {
        this.loadContent();
        this.listenPageChange();

    }

    /**
     * Gets the slug from the url
     *
     * @return slug {String} Slug for content
     */
    getSlug() {
        this.slug = window.location.hash;
        if ("" === this.slug) {
            return null;
        } else {
            return this.slug.substring(1);
        }
    }

    /**
     * Determines what to load in the view
     */
    loadContent() {
        this.slug = this.getSlug();
        view.clearContent();
        if (null === this.slug) {
            view.loadSingleContent('home');
        } else if ('blog' === this.slug) {
            view.loadBlogPosts();
        } else {
            view.loadSingleContent(this.slug);
        }

        if (false === editor.toggleEl.classList.contains('hidden')) {
            editor.fillEditoForm(model.getCurrentContent());
        }


    }

    /**
     * Listener function for URL changes
     *
     */
    listenPageChange() {
        window.addEventListener('hashchange', this.loadContent.bind(this), false)
    }

}

let router = new Router();