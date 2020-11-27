import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class LoginForm extends BaseForm {
    state = {
        fields: {
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
                }
            },
        },
        valid: false
    };

    handleChange = (e) => {
        this.validate(e.currentTarget);
    };

    handleSubmit = e => {
    }

    render() {
        const {fields: {email,  password}} = this.state;
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


                    <button
                        className="btn btn-primary btn-block mt-4 font-w600"
                        disabled={this.isInvalid()}
                        type="submit"
                    >
                        Login
                    </button>
                </form>
            </Fragment>
        );
    }
}
