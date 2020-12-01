import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class SettingsPasswordForm extends BaseForm {
    state = {
        fields: {
            currentPassword:  {
                name: 'currentPassword',
                value: '',
                error: '',
                validation: {
                    required: true,
                }
            },
            password:  {
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
    }

    render() {
        const {fields: {currentPassword, password, password_confirmation}} = this.state;
        const {route, token} = this.props;
        return (
            <Fragment>
                <form onSubmit={this.handleSubmit} method="post" action={route}>

                    {/*Token*/}
                    <Input
                        name="_token"
                        value={token}
                        type="hidden"
                    />

                    {/*Method*/}
                    <Input
                        name="_method"
                        value="PUT"
                        type="hidden"
                    />

                    {/* Current Password */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={currentPassword.name}
                                label="Current Password"
                                value={currentPassword.value}
                                error={currentPassword.error}
                                type="password"
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* New */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={password.name}
                                label="New Password"
                                value={password.value}
                                error={password.error}
                                type="password"
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* Confirm new password */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={password_confirmation.name}
                                label="Confirm New Password"
                                value={password_confirmation.value}
                                error={password_confirmation.error}
                                type="password"
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    <button
                        className="btn btn-primary btn-standard mt-2 font-w600"
                        disabled={this.isInvalid()}
                        type="submit"
                    >
                        Update
                    </button>
                </form>
            </Fragment>
        );
    }
}
