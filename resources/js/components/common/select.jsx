import React from "react";
import PropTypes from "prop-types";

const Select = ({ name, label, options = [], prompt = 'Select', error, className, ...rest }) => {
    return (
        <div className="form-group">
            {
                label && <label className={`${error ? 'text-danger' : ''}`} htmlFor={name}>{label}</label>
            }
            <select
                   className={`form-control ${className} ${error ? 'is-invalid' : ''}`}
                   id={name}
                   name={name}
                   aria-describedby={name}
                   {...rest}
            >
                <option value="">{prompt}</option>
                {
                    options.map((option, i) => <option key={i} value={option.value}>{option.label}</option>)
                }
            </select>
            {
                error && <small id={`${name}`} className="form-text text-danger">{error}</small>
            }
        </div>
    );
};

Select.propTypes = {
    name: PropTypes.string.isRequired,
    label: PropTypes.string,
    type: PropTypes.string,
    value: PropTypes.string,
    className: PropTypes.string,
    prompt: PropTypes.string,
    error: PropTypes.string,
    onChange: PropTypes.func,
    onKeyUp: PropTypes.func
};

export default Select;
