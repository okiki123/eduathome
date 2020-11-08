import React, {Component, Fragment} from 'react';
import RegisterForm from "./Register-Form";

export default class Register extends Component {
    state = {
        page: 1
    };

    handleNext = () => {
        this.setState({page: 2})
    }

    handlePrev = () => {
        this.setState({page: 1})
    }

    render() {
        const {caregiver, parent} =  this.props;
        return (
            <Fragment>
                <div className="container register">
                    <h3 className="mb-4 text-center font-w600">Register</h3>

                    {
                        this.state.page === 1 &&
                        <div className="row">
                            <div className="col-xl-4 col-md-5 offset-xl-2 offset-md-1 mb-3">
                                {/*Caregiver Prompt card*/}
                                <div
                                    className="shadow-sm d-flex justify-content-between align-items-center p-4 cursor-pointer"
                                    onClick={this.handleNext}
                                >
                                    <div>
                                        <img src="/images/register__teacher.svg" width="100" height="100" className="mr-3" />
                                        <span className="font-size-xl">{caregiver}</span>
                                    </div>
                                    <div>
                                        <i className="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>

                            {/*Parent Prompt card*/}
                            <div className="col-xl-4 col-md-5">
                                <div
                                    className="shadow-sm d-flex justify-content-between align-items-center p-4 cursor-pointer"
                                    onClick={this.handleNext}
                                >
                                    <div>
                                        <img src="/images/register__parent.svg" width="100" height="100" className="mr-3" />
                                        <span className="font-size-xl">{parent}</span>
                                    </div>
                                    <div>
                                        <i className="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    }

                    {
                        this.state.page === 2 &&
                        <div className="auth-card  mx-auto">
                            <div className="mb-3">
                                <a className="back cursor-pointer" onClick={this.handlePrev}>
                                    <i className="fas fa-long-arrow-alt-left mr-2"></i>
                                    Back
                                </a>
                            </div>
                            <div className="shadow p-3">
                                <RegisterForm />
                            </div>
                        </div>
                    }
                </div>

            </Fragment>
        );
    }
}
