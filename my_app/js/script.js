const { createApp } = Vue;

const endpoint = 'http://localhost/Boolean/php-todo-list-json/api/tasks/';

const app = createApp({
    name: 'Todo List PHP',

    data: () => ({
        tasks: [],
        newTask: ''
    }),

    methods: {
        addTask() {
            const data = { task: this.newTask }
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
                this.newTask = '';
            })
        }
    },

    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        })
    }
});

app.mount('#app');