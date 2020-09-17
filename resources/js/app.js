require('./bootstrap');
import './vue'

window.Vue = require('vue');

require('medium-editor/dist/css/medium-editor.css');
require('medium-editor/dist/css/themes/beagle.css');
import MediumEditor from 'medium-editor';

var editor = new MediumEditor('.editable', {
    placeholder: {
        text: `Begin your story ...`,
        hideOnClick: true
    }
});