export default () => ({
    async calculate(event) {
        let response = await submitForm(event);

        if (!response) return;

        if (response.error) {
            this.$store.app.validationErrors.expression = response.error;
            return;
        }

        this.clear();

        this.$refs.expression.value = response;
    },

    clear() {
        this.$store.app.validationErrors.expression = null;
    },
});
