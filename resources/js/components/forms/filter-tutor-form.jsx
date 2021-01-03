import React, {Fragment} from "react";
import BaseForm from "./base-form";
import Select from "../common/select";
import {getOption, processOptions} from "../../utils/helpers";
import http from "../../services/http";

export default class FilterTutorForm extends BaseForm {
    state = {
        fields: {
            state:  {
                name: 'state',
                value: parseInt(this.props.state) || '',
                error: ''
            },
            city: {
                name: 'city',
                value: parseInt(this.props.city) || '',
                error: ''
            }
        },
        cities: this.props.cities,
        valid: true
    };


    handleSubmit = e => {
    }

    handleChangeStateSelect = (e) => {
        this.fetchCities(e.value);
        const fields = {...this.state.fields};
        fields.city.value = null; // reset the city
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
        } else {
            const cities = [];
            this.setState({cities});
        }
    }

    render() {
        let {fields: {state, city}, cities} = this.state;
        let {action, states} = this.props;
        let caregiverState = getOption(states, state.value);
        let caregiverCity = getOption(cities, city.value);
        states = processOptions(states, 'state');
        cities = processOptions(cities, 'city');

        return (
            <Fragment>
                <form onSubmit={this.handleSubmit} method="get" action={action}>

                    {/*State*/}
                    <Select
                        name={state.name}
                        label="State"
                        labelClass="font-size-nm font-w600"
                        value={state.value}
                        error={state.error}
                        placeholder="State"
                        options={states}
                        defaultValue={caregiverState}
                        onChange={(e) => e ? this.handleChangeStateSelect(e) : this.handleChangeStateSelect({name: state.name, value: ''})}
                        addValidation={false}
                    />

                    {/*City*/}
                    <Select
                        name={city.name}
                        label="City"
                        labelClass="font-size-nm font-w600"
                        value={city.value}
                        error={city.error}
                        placeholder="City"
                        options={cities}
                        defaultValue={caregiverCity}
                        addValidation={false}
                    />


                    <div className="mb-3">
                        <button
                            className="btn btn-primary btn-block h-100 font-size-nm font-w600"
                            type="submit"
                        >
                            <i className="fas fa-filter mr-1"></i>
                            Filter
                        </button>
                    </div>
                </form>
            </Fragment>
        );
    }
}
