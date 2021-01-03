import React from "react";
import ReactSelect from "react-select";
import PropTypes from "prop-types";

const Select = ({ name, label, prompt = 'Select', error, className = '', value, addValidation = true, labelClass = '', ...rest }) => {
    return (
        <div className="form-group">
            {
                label && <label className={`${labelClass} ${error ? 'text-danger' : ''}`} htmlFor={name}>{label}</label>
            }
            <ReactSelect
                   className={`basic-single ${className} ${error ? 'is-invalid' : ''}`}
                   id={name}
                   name={name}
                   classNamePrefix="select"
                   isSearchable={true}
                   isClearable={true}
                   isLoading={false}
                   isRtl={false}
                   {...rest}
            />
            {addValidation && <input type="hidden" name={name} value={value}/>}
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
    value: PropTypes.any,
    addValidation: PropTypes.bool,
    className: PropTypes.string,
    prompt: PropTypes.string,
    error: PropTypes.string,
    onChange: PropTypes.func,
    onKeyUp: PropTypes.func
};

export default Select;
