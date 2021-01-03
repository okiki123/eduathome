import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Input from "../common/input";
import Select from "../common/select";
import {getOption, processOptions} from "../../utils/helpers";
import http from '../../services/http'

export default class ContactDetailsForm extends BaseForm {
    state = {
        fields: {
            street1: {
                name: 'street1',
                value: this.props.caregiver.street1 || '',
                error: '',
                validation: {
                    required: true
                }
            },
            street2: {
                name: 'street2',
                value: this.props.caregiver.street2 || '',
                error: ''
            },
            city: {
                name: 'city',
                value: this.props.caregiver.city_id || '',
                error: '',
                validation: {
                    required: true
                }
            },
            state: {
                name: 'state',
                value: this.props.caregiver.state_id || '',
                error: '',
                validation: {
                    required: true
                }
            }
        },
        valid: false,
        cities: this.props.cities,
        selectedCity: {}
    };

    handleChange = (e) => {
        const target = e.currentTarget || e;
        this.validate(target);
    };

    handleChangeStateSelect = (e) => {
        this.handleChange(e);
        this.fetchCities(e.value);
        const fields = {...this.state.fields};
        fields.city.value = ''; // reset the city
        this.setState({fields})
    };

    fetchCities = async (stateId) => {
        if (!!stateId) {
            try {
                let cities = await http.get(`/api/cities?state_id=${stateId}`);
                cities = processOptions(cities.data, 'city');
                this.setState({cities});
            } catch (e) {
                toastr.error('unable to fetch cities');
            }
        }
    }

    render() {
        let {fields: {city, street1, street2, state}, cities} = this.state;
        let {route, token, states} = this.props;
        let caregiverState = getOption(states, state.value);
        let caregiverCity = getOption(cities, city.value);
        states = processOptions(states, 'state');
        cities = processOptions(cities, 'city');

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

                    {/* State */}
                    <div className="row">
                        <div className="col-md-12">
                            <Select
                                name={state.name}
                                label="State"
                                value={state.value}
                                error={state.error}
                                options={states}
                                defaultValue={caregiverState}
                                onChange={(e) => e ? this.handleChangeStateSelect(e) : this.handleChangeStateSelect({name: state.name, value: ''})}
                            />
                        </div>
                    </div>

                    {/* City */}
                    <div className="row">
                        <div className="col-md-12">
                            <Select
                                name={city.name}
                                label="City"
                                value={city.value}
                                error={city.error}
                                options={cities}
                                defaultValue={caregiverCity}
                                onChange={(e) => e ? this.handleChange(e) : this.handleChange({name: city.name, value: ''})}
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
