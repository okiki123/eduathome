export const REGEX = {
    EMAIL: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
};

export const validate = (value, validation = {}, fieldName = '') => {
    const defaultValidation = {
        required: false,
        email: false,
        min: 0,
        confirm: {
            check: false,
            referenceValue: ''
        }
    };

    const rules = {...defaultValidation, ...validation};

    if (!value) {
        return rules.required ? `${fieldName} is required` : null;
    }

    if (rules.email) {
        return REGEX.EMAIL.test(value) ? null : `${fieldName} is not a valid email`;
    }

    if (rules.confirm.check) {
        return value === rules.confirm.referenceValue ? null : `${fieldName} do not match`;
    }

    if (rules.min) {
        return value.length >= rules.min ? null : `${fieldName} must contain min of ${rules.min} characters`;
    }
};
