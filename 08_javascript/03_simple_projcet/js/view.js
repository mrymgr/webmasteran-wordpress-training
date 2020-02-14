'use strict';

/**
 * View file for displaying content
 * */

/**
 * Main View class
 *
 * @property array {posts} Array of posts for view object
 * */
class View {

    /**
     * class constructor method
     */
    constructor() {
        /**
         * @var posts array of post objects
         */
        this.posts = model.getPosts();
        this.pages = model.getPages();
    }


    /**
     * Init function for view object
     */
    init() {

        this.createMainMenu();
    }

    /**
     * Get blog post and appends them to the page.
     */
    loadBlogPosts() {
        let postMarkup = document.createDocumentFragment(),
            primaryContentEl = Helpers.getPageContentEl();
        this.posts = model.getPosts();
        for (let i = 0, max = this.posts.length; i < max; i++) {
            postMarkup.appendChild(this.createPostMarkup(this.posts[i]))

        }
        primaryContentEl.appendChild(postMarkup);

    }


    /**
     * Load a single blog post or page
     *
     * @param {String} slug  Post to create markup
     */
    loadSingleContent(slug) {
        let contentObj = model.getPost(slug),
            titleEl = Helpers.getPageTitleEl(),
            contentEl = Helpers.getPageContentEl();
        if  (null === contentObj) {
            contentObj = model.getPage(slug);
        }

        if ( null === contentObj ) {
            contentObj = {
                title: '404 Error',
                content: 'Content not found in this site!!!'
            }
        }
        titleEl.innerHTML = contentObj.title;
        contentEl.innerHTML = contentObj.content;
    }

    /**
     * Create Markup for blog posts
     *
     * @param {Object} post Post to create markup
     * @return {Object} articleEl Final post markup
     */
    createPostMarkup(post) {

        let articleEl = document.createElement('article'),
            titleEl = document.createElement('h3'),
            titleLink = document.createElement('a'),
            titleText = document.createTextNode(post.title),
            contentEl = document.createElement('div');

        titleLink.appendChild(titleText);
        titleLink.href = '#' + post.slug;
        titleEl.appendChild(titleLink);

        contentEl.appendChild(document.createTextNode(post.content));

        articleEl.appendChild(titleEl);
        articleEl.appendChild(contentEl);

        return articleEl;

    }

    /**
     * Clears title and main content from page
     *
     *
     */
    clearContent() {
        let titleEl = Helpers.getPageTitleEl(),
            contentEl = Helpers.getPageContentEl();
        titleEl.innerHTML = '';
        contentEl.innerHTML = '';

    }

    /**
     * Create Main Menu links for pages
     *
     */
    createMainMenu() {
        let menuMarkup = document.createDocumentFragment(),
            mainMenuEl = Helpers.getMainMenuEl();
        /*this.pages = model.getPages();*/
        for( let i = 0 , max = this.pages.length ; i < max ; i++) {
            menuMarkup.appendChild(Helpers.createMenuItem(this.pages[i]));

        }
        mainMenuEl.appendChild(menuMarkup);

    }


}

let view = new View();



