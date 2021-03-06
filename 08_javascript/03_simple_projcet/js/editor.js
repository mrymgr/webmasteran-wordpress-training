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
        this.unSavedContent = false;
    }

    /**
     * Initializes the editor object
     */
    init() {
        this.listenEditorToggle();
        this.checkEditorHidden();
    }

    /**
     * Dynamically fills the edit form based on url
     * @param {Object} contentObj post or page object to load in form
     */
    fillEditoForm(contentObj) {

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
        this.titleForm.addEventListener('input', this.updateTitle, false);
        this.contentForm.addEventListener('input', this.updateContent.bind(this), false);
        this.updateButton.addEventListener('click', this.saveContent.bind(this), false);
        let links = Helpers.getLinks();
        links.forEach(function (link) {
            link.addEventListener('click', editor.protectUnsavedContent, false);
        });
    }

    /**
     * Add alert if links are clicked with unsaved content
     *
     */
    protectUnsavedContent = () => {
        if (true === this.unSavedContent) {
            let confirm = window.confirm('You have Unsaved data');
            if (false === confirm) {
                event.preventDefault();
            } else {
                editor.unSavedContent = false;
                this.currentContent = model.getCurrentContent();
            }
        }


    };

    /**
     * Update title when change in editor
     *
     */
    updateTitle = () => {
        const title = Helpers.getEditorTitleEl().value;
        this.unSavedContent = true;
        view.updateTitle(title);
    };

    /**
     * Update content when change in editor
     *
     */
    updateContent() {
        const content = Helpers.getEditorContentEl().value;
        this.unSavedContent = true;
        view.updateContent(content);
    }

    /**
     * Save content & title of editor in local storage
     */
    saveContent() {
        event.preventDefault();
        this.animateSaveButton();
        const title = Helpers.getEditorTitleEl().value;
        const content = Helpers.getEditorContentEl().value;
        this.currentContent.title = title;
        this.currentContent.content = content;
        model.updateContent(this.currentContent);
        this.unSavedContent = false;


    }

    /**
     * Animates the update button to mimic saving data
     */
    animateSaveButton() {
        let updateButton = Helpers.getEditorUpdateButtonEl(),
            saved = function () {
                updateButton.innerText = 'Update';
            },
            saving = function () {
                updateButton.innerText = 'Saved';
                setTimeout(saved, 800);
            };
        updateButton.innerText = 'Saving...';
        setTimeout(saving, 2000);
    }

    /**
     * Control the toggle for editor
     * @return {Object} Main toggle element
     */
    toggle(event) {
        this.currentContent = model.getCurrentContent();
        this.editorEl.classList.toggle('hidden');
        this.toggleEl.classList.toggle('hidden');
        if (undefined !== event) {
            event.preventDefault();
        }
        if (false === this.toggleEl.classList.contains('hidden')) {
            this.fillEditoForm(this.currentContent);
            model.updateIsEditorHidden(false);
        } else {
            model.updateIsEditorHidden(true);
        }
    }

    checkEditorHidden() {
        let isHidden = model.checkIsEditorHidden();
        if ( false === isHidden ) {
            this.toggle();
        }
    }
}

let editor = new Editor();
