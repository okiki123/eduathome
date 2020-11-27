import React from 'react';
import ReactDOM from 'react-dom';
import Register from "./Register";
import Login from "./Login";
import ContactDetailsForm from "./forms/contact-details-form";
import BasicDetailsForm from "./forms/basic-details-form";
import SettingsPasswordForm from "./forms/settings-password-form";

let token;

if (document.getElementById('csrf-token')) {
    token = document.getElementById('csrf-token').getAttribute('content');
}

if (document.getElementById('register')) {
    const element = document.getElementById('register');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Register {...props} />, element);
}

if (document.getElementById('login')) {
    const element = document.getElementById('login');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Login {...props}l />, element);
}

if (document.getElementById('settings-contact-details')) {
    const element = document.getElementById('settings-contact-details');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<ContactDetailsForm {...props} />, element);
}

if (document.getElementById('settings-basic-details')) {
    const element = document.getElementById('settings-basic-details');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<BasicDetailsForm {...props} />, element);
}

if (document.getElementById('settings-password')) {
    const element = document.getElementById('settings-password');
    const props = {token};
    ReactDOM.render(<SettingsPasswordForm {...props} />, element);
}
