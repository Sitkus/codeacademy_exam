'use strict';

const endpoints = {
    get: '/api/reviews/get',
    create: '/api/reviews/create'
};

/**
 * This defines how JS code selects elements by ID
 */
const selectors = {
    forms: {
        create: 'review-create-form',
    },
    table: 'table'
}

/**
 * Executes API request
 *
 * @param {type} url Endpoint URL
 * @param {type} formData instance of FormData
 * @param {type} success Success callback
 * @param {type} fail Fail callback
 * @returns {undefined}
 */
function api(url, formData, success, fail) {
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.json())
        .then(obj => {
            if (obj.status === 'success') {
                success(obj.data);
            } else {
                fail(obj.errors);
            }
        })
        .catch(e => {
            if (e.toString() == 'SyntaxError: Unexpected token < in JSON at position 0') {
                fail(['Problem is with your API controller, did not return JSON! Check Chrome->Network->XHR->Response']);
            } else {
                fail([e.toString()]);
            }
        });
};

/**
 * Form array
 * Contains all form-related functionality
 *
 * Object forms
 */
const forms = {

    /**
     * Create Form
     */
    create: {
        init: function () {
            if (this.getElement()) {
                this.getElement().addEventListener('submit', this.onSubmitListener);

                return true;
            }

            return false;
        },
        getElement: function () {
            return document.getElementById(selectors.forms.create);
        },
        onSubmitListener: function (e) {
            let formData = new FormData(e.target);
            formData.append('action', 'create');

            api(endpoints.create, formData, forms.create.success, forms.create.fail);

            e.preventDefault();
        },
        success: function (data) {
            const element = forms.create.getElement();

            table.row.append(data);
            forms.ui.errors.hide(element);
            forms.ui.clear(element);
            forms.ui.flash.class(element, 'success');
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        }
    },

    /**
     * Common/Universal Form UI Functions
     */
    ui: {
        init: function () {
            return true;
        },
        clear: function (form) {
            let fields = form.querySelectorAll('[name]');

            fields.forEach(field => {
                field.value = '';
            });
        },
        flash:
            function (element, class_name) {
                const prev = element.className;
                element.className += class_name;

                setTimeout(function () {
                    element.className = prev;
                }, 1000);
            },

        /**
         * Form-error related functionality
         */
        errors: {

            /**
             * Shows errors in form
             * Each error index correlates with input name attribute
             *
             * @param {Element} form
             * @param {Object} errors
             */
            show: function (form, errors) {
                this.hide(form);

                Object.keys(errors).forEach(function (error_id) {
                    const field = form.querySelector('textarea[name="' + error_id + '"]');

                    if (field) {
                        const span = document.createElement("span");
                        span.className = 'field-error';
                        span.innerHTML = errors[error_id];
                        field.parentNode.append(span);
                    }
                });
            },
            /**
             * Hides (destroys) all errors in form
             * @param {type} form
             */
            hide: function (form) {
                const errors = form.querySelectorAll('.field-error');
                if (errors) {
                    errors.forEach(node => {
                        node.remove();
                    });
                }
            }
        }
    }
};

/**
 * Table-related functionality
 */
const table = {
    getElement: function () {
        return document.getElementsByClassName(selectors.table)[0];
    },
    init: function () {
        if (this.getElement()) {
            this.data.load();

            Object.keys(this.buttons).forEach(buttonId => {
                let success = table.buttons[buttonId].init();
            });

            return true;
        }

        return false;
    },

    /**
     * Data-Related functionality
     */
    data: {
        /**
         * Loads data and populates table from API
         * @returns {undefined}
         */
        load: function () {
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            Object.keys(data).forEach(i => {
                table.row.append(data[i]);
            });
        },
        fail: function (errors) {
            console.log(errors);
        }
    },

    /**
     * Operations with items
     */
    row: {

        /**
         * Builds item element from data
         *
         * @param {Object} data
         * @returns {Element}
         */
        build: function (data) {
            const row = document.createElement('tr');

            if (data.id == null) {
                throw Error('JS can`t build the row, because API data doesn`t contain its ID. Check API controller!');
            }

            row.setAttribute('data-id', data.id);
            row.className = 'data-row';

            Object.keys(data).forEach(data_id => {
                switch (data_id) {
                    case 'buttons':
                        let buttons = data[data_id];
                        Object.keys(buttons).forEach(button_id => {
                            let td = document.createElement('td');
                            let btn = document.createElement('button');

                            btn.innerHTML = buttons[button_id];
                            btn.className = button_id;

                            td.append(btn);
                            row.append(td);
                        });
                        break;
                    default:
                        let td = document.createElement('td');

                        td.innerHTML = data[data_id];
                        td.className = data_id;

                        row.append(td);
                }
            });
            return row;
        },

        /**
         * Appends item to table from data
         *
         * @param {Object} data
         */
        append: function (data) {
            table.getElement().append(this.build(data));
        },
    }
};

/**
 * Core page functionality
 */
const app = {
    init: function () {

        // Initialize all forms
        Object.keys(forms).forEach(formId => {
            let success = forms[formId].init();
        });

        let success = table.init();
    }
};

// Self-launch App
app.init();
