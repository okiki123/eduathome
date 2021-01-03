import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";
import Select from "../common/select";

export default class BannerSearchForm extends BaseForm {
    state = {
        fields: {
            location:  {
                name: 'location',
                value: '',
                error: ''
            }
        },
        valid: true
    };

    handleSubmit = e => {
    }

    render() {
        const {fields: {location}} = this.state;
        const {action, states} = this.props;

        return (
            <Fragment>
                <form className="d-md-flex" onSubmit={this.handleSubmit} method="get" action={action}>

                    <div className="col-md-6">
                        {/*Location*/}
                        <Select
                            name={location.name}
                            value={location.value}
                            error={location.error}
                            placeholder="Location"
                            options={states}
                            addValidation={false}
                        />
                    </div>


                    <div className="mb-3 col-md-6">
                        <button
                            className="btn btn-primary btn-block h-100 font-size-lg font-w600"
                            type="submit"
                        >
                            Search
                        </button>
                    </div>
                </form>
            </Fragment>
        );
    }
}
