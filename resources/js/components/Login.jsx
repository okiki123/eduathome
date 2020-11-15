import React, {Component, Fragment} from 'react';
import LoginForm from "./forms/Login-form";

export default class Login extends Component {
    state = {
    };

    render() {
        const {route, token, registerRoute, data} =  this.props;
        return (
            <Fragment>
                <div className="container register">
                    <h3 className="mb-4 text-center font-w600">Login</h3>

                    <div className="auth-card  mx-auto">
                        <div className="mb-3 d-flex justify-content-end">
                            <a className="auth-link cursor-pointer" href={registerRoute}>
                                Register
                            </a>
                        </div>
                        <div className="shadow p-3">
                            <LoginForm action={route} token={token} data={data} />
                        </div>
                    </div>
                </div>

            </Fragment>
        );
    }
}
