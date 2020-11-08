import React, {Component} from "react";
import {validate} from "./utils/validator";

export default class BaseForm extends Component {
    isInvalid = () => {
        const fields = this.state.fields;
        const keys = Object.keys(fields);
        return keys.some(field => {
           return (fields[field].validation?.required && fields[field].value === '') || fields[field].error;
        });
    };

    getValue = () => {
        const value = {};
        const fields = this.state.fields;
        for (const key in fields) {
            value[key] = fields[key].value;
        }

        return value;
    };

    validate = ({name, value}) => {
        const fields = {...this.state.fields};
        fields[name].value = value;
        fields[name].error = validate(value, fields[name].validation, fields[name].name);
        if ( name === 'password' && fields.confirmPassword) {
            fields.confirmPassword.validation.confirm.referenceValue = value;
        }
        this.setState({fields});
    }
}
