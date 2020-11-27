import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class BasicDetailsForm extends BaseForm {
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
            email: {
                name: 'email',
                value: this.props.data.email || '',
                error: '',
                validation: {
                    required: true,
                    email: true
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
        const {fields: {firstname, lastname, email}} = this.state;
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

                    <div className="row">
                        <div className="col-md-6">
                            {/*FirstName*/}
                            <Input
                                name={firstname.name}
                                label="Firstname"
                                value={firstname.value}
                                error={firstname.error}
                                onChange={this.handleChange}
                            />
                        </div>

                        <div className="col-md-6">
                            {/*Lastname*/}
                            <Input
                                name={lastname.name}
                                label="Lastname"
                                value={lastname.value}
                                error={lastname.error}
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* Email */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={email.name}
                                label="Email"
                                value={email.value}
                                error={email.error}
                                readonly="true"
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
