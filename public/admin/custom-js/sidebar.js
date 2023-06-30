new Vue({
    el: '#admin_sidebar',
    data: {
        category: null,
    },
    created() {
        this.category = location.pathname
    },
});
