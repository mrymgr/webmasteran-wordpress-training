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
        this.titleForm = Helpers.getEditorTitleEl();
        this.contentForm = Helpers.getEditorContentEl();
        this.updateButton = Helpers.getEditorUpdateButtonEl();
        this.currentContent = '';
    }

    /**
     * Initializes the editor object
     */
    init() {
        this.listenEditorToggle();
    }

    /**
     * Dynamically fills the edit form based on url
     * @param {Object} contentObj post or page object to load in form
     */
    fillEditoForm( contentObj ) {

        this.titleForm.value = contentObj.title;
        this.contentForm.value = contentObj.content;
        this.addFormListener();
    }

    /**
     * Listens for the editor toggle button
     */
    listenEditorToggle() {
        this.toggleEl.addEventListener('click', this.toggle.bind(this), false);
    }

    /**
     * Adds event listeners to form elements
     *
     */
    addFormListener() {
        this.titleForm.addEventListener('input',view.updateTitleFromForm,false);
        this.contentForm.addEventListener('input',view.updateContentFromForm, false);
        this.updateButton.addEventListener('click',this.updateContent.bind(this));
    }


    updateContent() {
        event.preventDefault();
        model.updateContent(this.currentContent);

    }

    /**
     * Control the toggle for editor
     * @return {Object} Main toggle element
     */
    toggle(event) {
        this.currentContent = model.getCurrentContent();
        this.editorEl.classList.toggle('hidden');
        this.toggleEl.classList.toggle('hidden');
        event.preventDefault();
        if ( false === this.toggleEl.classList.contains( 'hidden')) {
            this.fillEditoForm( this.currentContent)
        }
    }
}

let editor = new Editor();
