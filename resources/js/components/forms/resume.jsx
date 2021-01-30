import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";

export default class Resume extends BaseForm {
    state = {
        error: "",
        file: null,
        fileName: "Choose File",
        inputFile: this.props.file,
        acceptedFiles: [
            'image/png',
            'image/jpg',
            'image/jpeg',
            'application/pdf'
        ]
    };

    handleChange = (e) => {
        const file = e.currentTarget.files[0];
        let error = "";

        if (!this.state.acceptedFiles.includes(file.type)) {
            error = "The accepted files are png, jpg, jpeg and pdf";
        } else if (file.size > 2097152) {
            error = "The maximum file size acceptable is 2MB";
        }

        this.setState({error, fileName: file.name, file})
    };

    handleSubmit = e => {
    }

    render() {
        const {error, file, fileName, inputFile} = this.state;
        const {route, token, name} = this.props;

        return (
            <Fragment>
                <form method="post" action={route} enctype="multipart/form-data">

                    {/*Token*/}
                    <Input
                        name="_token"
                        value={token}
                        type="hidden"
                    />

                    <div className="custom-file">
                        <input
                            type="file"
                            name="resume"
                            className="custom-file-input"
                            id="resume"
                            onChange={this.handleChange}
                        />
                        <label className="custom-file-label" htmlFor="resume">{fileName}</label>
                    </div>
                    <small className="text-danger">{error}</small>

                    <div className="my-1">
                        {!!inputFile && <a href={inputFile} title="View" target="_blank">{name}</a>}
                    </div>

                    <div>
                        <button
                            className="btn btn-primary btn-standard mt-3 font-w600"
                            disabled={error || !file}
                            type="submit"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </Fragment>
        );
    }
}
