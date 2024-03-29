const { createApp } = Vue;

const endpoint = 'http://localhost/Boolean/php-todo-list-json/api/tasks/';

const app = createApp({
    name: 'Todo List PHP',

    data: () => ({
        tasks: [],
        newTask: ''
    }),

    methods: {
        fetchApi(endpoint, data) {
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
            })
        },

        addTask() {
            const data = { task: this.newTask };
            this.fetchApi(endpoint, data);
            this.newTask = '';
        },

        toggleTask(id) {
            const data = { id };
            this.fetchApi(`${endpoint}toggle/`, data);
        },

        deleteTask(id) {
            const data = { id };
            this.fetchApi(`${endpoint}delete/`, data);
        },
    },

    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        })
    }
});

app.mount('#app');