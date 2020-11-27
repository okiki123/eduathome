import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class ContactDetailsForm extends BaseForm {
    state = {
        fields: {
            street1: {
                name: 'street1',
                value: this.props.data.street1 || '',
                error: '',
                validation: {
                    required: true
                }
            },
            street2: {
                name: 'street2',
                value: this.props.data.street2 || '',
                error: ''
            },
            city: {
                name: 'city',
                value: this.props.data.street1 || '',
                error: '',
                validation: {
                    required: true
                }
            },
            state: {
                name: 'state',
                value: this.props.data.street1 || '',
                error: '',
                validation: {
                    required: true
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
        const {fields: {city, street1, street2, state}} = this.state;
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

                    {/* Street1 */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={street1.name}
                                label="Street Address 1"
                                value={street1.value}
                                error={street1.error}
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* Street2 */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={street2.name}
                                label="Street Address 2"
                                value={street2.value}
                                error={street2.error}
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* City */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={city.name}
                                label="City"
                                value={city.value}
                                error={city.error}
                                onChange={this.handleChange}
                            />
                        </div>
                    </div>

                    {/* State */}
                    <div className="row">
                        <div className="col-md-12">
                            <Input
                                name={state.name}
                                label="State"
                                value={state.value}
                                error={state.error}
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
