window.submitForm = async function submitForm(event) {
    let formData = new FormData(event.target);

    let result;

    await axios
        .request({
            url: event.target.action,
            method: event.target.method,
            data: formData,
        })
        .then((response) => {
            if (response.error) {
                handleServerError(response.error);
                return;
            }
            result = response.data;
        })
        .catch((response) => {
            if (response.response.data.errors) {
                handleValidationError(response.response.data.errors);
                return;
            }

            if (response.response.data.exception) {
                handleServerError(response.response.data.message);
                return;
            }

            console.log("Ошибка, которой нет в обработчике");
        });

    if (result) {
        return result;
    }
};

function handleValidationError(errors) {
    Alpine.store("app").validationErrors = errors;
}

function handleServerError(message) {
    Alpine.store("app").serverErrorMessage = message;
    Alpine.store("app").serverError = true;
}
