import React, {Component, Fragment} from 'react';
import LoginForm from "./forms/Login-form";

export default class Login extends Component {
    state = {
    };

    render() {
        const {route, token, registerRoute, data, type} =  this.props;
        return (
            <Fragment>
                <div className="container register">
                    <h3 className="mb-3 text-center font-w600">Welcome</h3>
                    <p className="mb-4 font-size-lg text-center">Please use your credentials to continue</p>

                    <div className="auth-card  mx-auto">
                        <div className="p-3">
                            <LoginForm action={route} token={token} data={data} />
                        </div>
                        {
                            type === 'default' &&
                            <div className="mt-2 px-3">
                                Don't have an account? <a className="auth-link cursor-pointer" href={registerRoute}>
                                Register
                            </a>
                            </div>
                        }
                    </div>
                </div>

            </Fragment>
        );
    }
}
