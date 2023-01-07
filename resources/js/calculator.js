export default () => ({
    async calculate(event) {
        let response = await submitForm(event);

        if (!response) return;

        if (response.error) {
            this.$store.app.validationErrors.expression = response.error;
            return;
        }

        this.clear();

        this.$dispatch("calculated", {
            expression: this.$refs.expression.value,
            result: response,
        });

        this.$refs.expression.value = response;
    },

    clear() {
        this.$store.app.validationErrors.expression = null;
    },

    setInput() {
        this.$el.value = this.$event.detail;
        this.$el.focus();
    },
});
