import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";
import TextArea from "../common/text-area";

export default class BioResumeForm extends BaseForm {
    state = {
        fields: {
            bio: {
                name: 'bio',
                value: this.props.data.bio || '',
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

    render() {
        const {fields: {bio}} = this.state;
        let {route, token} = this.props;

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

                    {/* Bio */}
                    <div className="row">
                        <div className="col-md-12">
                            <TextArea
                                name={bio.name}
                                label="Bio"
                                value={bio.value}
                                error={bio.error}
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
