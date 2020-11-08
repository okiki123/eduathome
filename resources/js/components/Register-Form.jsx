import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "./common/input";

export default class RegisterForm extends BaseForm {
    state = {
        fields: {
            email:  {
                name: 'email',
                value: '',
                error: '',
                validation: {
                    required: true,
                    email: true
                }
            },
            password: {
                name: 'password',
                value: '',
                error: '',
                validation: {
                    required: true,
                    min: 6
                }
            },
            confirmPassword: {
                name: 'confirmPassword',
                value: '',
                error: '',
                validation: {
                    required: true,
                    confirm: {
                        check: true,
                        referenceValue: ''
                    }
                }
            }
        },
        valid: false
    };

    handleChange = (e) => {
        this.validate(e.currentTarget);
    };

    handleSubmit = e => {
        e.preventDefault();
        console.log(this.getValue());
    }

    render() {
        const {fields: {email,  password, confirmPassword}} = this.state;
        return (
            <Fragment>
                <form onSubmit={this.handleSubmit}>

                    {/*Email*/}
                    <Input
                        name={email.name}
                        label="Email"
                        value={email.value}
                        error={email.error}
                        onChange={this.handleChange}
                    />

                    {/*Password*/}
                    <Input
                        name={password.name}
                        label="Password"
                        value={password.value}
                        error={password.error}
                        onChange={this.handleChange}
                    />

                    {/*ConfirmPassword*/}
                    <Input
                        name={confirmPassword.name}
                        label="Confirm Password"
                        value={confirmPassword.value}
                        error={confirmPassword.error}
                        onChange={this.handleChange}
                    />

                    <button
                        className="btn btn-primary btn-block mt-4 font-w600"
                        disabled={this.isInvalid()}
                        type="submit"
                    >
                        Submit
                    </button>
                </form>
            </Fragment>
        );
    }
}
