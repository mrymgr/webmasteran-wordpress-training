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
        this.posts = model.getPosts()
    }


    /**
     * Init function for view object
     */
    init() {

        this.loadBlogPosts();
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
     * Load a single blog post
     *
     * @param {string} slug  Post to create markup
     */
    loadBlogPost(slug) {
        let post = model.getPost(slug),
            titleEl = Helpers.getPageTitleEl(),
            contentEl = Helpers.getPageContentEl();
        titleEl.innerHTML = post.title;
        contentEl.innerHTML = post.content;
    }

    /**
     * Create Markup for blog posts
     *
     * @param {object} post Post to create markup
     * @return {object} articleEl Final post markup
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
}

let view = new View();

