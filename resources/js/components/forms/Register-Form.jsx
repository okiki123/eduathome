import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class RegisterForm extends BaseForm {
    state = {
        fields: {
            firstname:  {
                name: 'firstname',
                value: this.props.data.firstname || '',
                error: '',
                validation: {
                    required: true,
                }
            },
            lastname:  {
                name: 'lastname',
                value: this.props.data.lastname || '',
                error: '',
                validation: {
                    required: true,
                }
            },
            email:  {
                name: 'email',
                value: this.props.data.email || '',
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
            password_confirmation: {
                name: 'password_confirmation',
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
        console.log(this.getValue());
    }

    render() {
        const {fields: {firstname, lastname, email,  password, password_confirmation}} = this.state;
        const {action, token} = this.props;
        return (
            <Fragment>
                <form onSubmit={this.handleSubmit} method="post" action={action}>

                    {/*Token*/}
                    <Input
                        name="_token"
                        value={token}
                        type="hidden"
                    />

                    {/*Firstname*/}
                    <Input
                        name={firstname.name}
                        label="Firstname"
                        value={firstname.value}
                        error={firstname.error}
                        onChange={this.handleChange}
                    />

                    {/*Lastname*/}
                    <Input
                        name={lastname.name}
                        label="Lastname"
                        value={lastname.value}
                        error={lastname.error}
                        onChange={this.handleChange}
                    />

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
                        type="password"
                    />

                    {/*password_confirmation*/}
                    <Input
                        name={password_confirmation.name}
                        label="Confirm Password"
                        value={password_confirmation.value}
                        error={password_confirmation.error}
                        onChange={this.handleChange}
                        type="password"
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
