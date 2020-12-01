export const processOptions = (options, name) => {
    return options.map(function (item) {
        return {...item, name}
    });
};

export const getOption = (options, value) => {
    return options.filter((item) => {
        return item.value == value
    })[0];
};
