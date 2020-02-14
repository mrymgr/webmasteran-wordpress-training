'use strict';

/**
 * Editor file for editing content
 * */

/**
 * Main Editor class
 *
 * */
class Editor {

    /**
     * class constructor method
     */
    constructor() {
        this.toggleEl = Helpers.getEditorToggleEl();
        this.editorEl = Helpers.getEditorEl();
    }

    /**
     * Initializes the editor object
     */
    init() {
        editor.listenEditorToggle();
    }

    /**
     * Listens for the editor toggle button
     */
    listenEditorToggle() {
        this.toggleEl.addEventListener('click', this.toggle.bind(this), false);
    }

    /**
     * Control the toggle for editor
     * @return {object} Main toggle element
     */
    toggle(event) {
        this.editorEl.classList.toggle('hidden');
        this.toggleEl.classList.toggle('hidden');
        event.preventDefault();
    }
}

let editor = new Editor();
