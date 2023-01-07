import calculator from "./calculator";

Alpine.store("app", {
    validationErrors: {},
    serverError: false,
    serverErrorMessage: "",
    history: {},
});

Alpine.data("calculator", calculator);

Alpine.start();
