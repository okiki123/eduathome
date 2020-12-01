import React from "react";

const Toastr = (data) => {
    if (data.status) {
        toastr[data.status](data.message); // toastr is part of the window object in js/libs/toastr.js
    }

    return (<div></div>);
};

export default Toastr;
