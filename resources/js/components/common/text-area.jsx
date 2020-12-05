import React from "react";
import PropTypes from "prop-types";

const TextArea = ({ name, label, error, className, placeholder, rows = "4", ...rest }) => {
    return (
        <div className="form-group">
            {
                label && <label className={`${error ? 'text-danger' : ''}`} htmlFor={name}>{label}</label>
            }
            <textarea name={name}
                   className={`form-control ${className} ${error ? 'is-invalid' : ''}`}
                   id={name}
                   rows={rows}
                   aria-describedby={name}
                   style={{resize: "none"}}
                   {...rest}>
                {placeholder || ''}
            </textarea>
            {
                error && <small id="emailHelp" className="form-text text-danger">{error}</small>
            }
        </div>
    );
};

TextArea.propTypes = {
    name: PropTypes.string.isRequired,
    label: PropTypes.string,
    type: PropTypes.string,
    className: PropTypes.string,
    value: PropTypes.string,
    placeholder: PropTypes.string,
    error: PropTypes.string,
    onChange: PropTypes.func,
    onKeyUp: PropTypes.func
};

export default TextArea;
