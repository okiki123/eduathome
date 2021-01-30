import React from 'react';
import ReactDOM from 'react-dom';
import Register from "./Register";
import Login from "./Login";
import ContactDetailsForm from "./forms/contact-details-form";
import BasicDetailsForm from "./forms/basic-details-form";
import SettingsPasswordForm from "./forms/settings-password-form";
import Toastr from "./common/toastr";
import BioResumeForm from "./forms/bio-resume-form";
import BannerSearchForm from "./forms/banner-search-form";
import FilterTutorForm from "./forms/filter-tutor-form";
import AvatarUpload from "./forms/avatar-upload";
import Resume from "./forms/resume";

let token;

if (document.getElementById('csrf-token')) {
    token = document.getElementById('csrf-token').getAttribute('content');
}

// Register page
if (document.getElementById('register')) {
    const element = document.getElementById('register');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Register {...props} />, element);
}

// Login Page
if (document.getElementById('login')) {
    const element = document.getElementById('login');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Login {...props}l />, element);
}

// User settings Page - Address & Contact Details Form
if (document.getElementById('settings-contact-details')) {
    const element = document.getElementById('settings-contact-details');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<ContactDetailsForm {...props} />, element);
}

// Avatar Upload
if (document.getElementById('avatar-upload')) {
    const element = document.getElementById('avatar-upload');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<AvatarUpload {...props} />, element);
}

// User settings Page - Basic Details Form
if (document.getElementById('settings-basic-details')) {
    const element = document.getElementById('settings-basic-details');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<BasicDetailsForm {...props} />, element);
}

// User settings Page - Resume Form
if (document.getElementById('resume-form')) {
    const element = document.getElementById('resume-form');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Resume {...props} />, element);
}

// User settings Page - Change password Form
if (document.getElementById('settings-password')) {
    const element = document.getElementById('settings-password');
    let props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<SettingsPasswordForm {...props} />, element);
}

// User settings Page - Bio and Resume form
if (document.getElementById('bio-and-resume')) {
    const element = document.getElementById('bio-and-resume');
    let props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<BioResumeForm {...props} />, element);
}

// Toastr Notification
if (document.getElementById('toastr-notification')) {
    const element = document.getElementById('toastr-notification');
    const props = JSON.parse(element.dataset.props);
    ReactDOM.render(<Toastr {...props} />, element);
}

// Banner Search Form
if (document.getElementById('banner-search')) {
    const element = document.getElementById('banner-search');
    const props = JSON.parse(element.dataset.props);
    ReactDOM.render(<BannerSearchForm {...props} />, element);
}

// Banner Tutor Form
if (document.getElementById('filter-tutor')) {
    const element = document.getElementById('filter-tutor');
    const props = JSON.parse(element.dataset.props);
    ReactDOM.render(<FilterTutorForm {...props} />, element);
}
