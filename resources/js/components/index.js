import React from 'react';
import ReactDOM from 'react-dom';
import Register from "./Register";
import Login from "./Login";

let token;

if (document.getElementById('csrf-token')) {
    token = document.getElementById('csrf-token').getAttribute('content');
}

if (document.getElementById('register')) {
    const element = document.getElementById('register');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Register {...props} />, document.getElementById('register'));
}

if (document.getElementById('login')) {
    const element = document.getElementById('login');
    const props = JSON.parse(element.dataset.props);
    props.token = token;
    ReactDOM.render(<Login {...props} />, document.getElementById('login'));
}
