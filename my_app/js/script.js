const { createApp } = Vue;

const app = createApp({
    name: 'Todo List PHP',

    data: () => ({
        tasks: [
            {
                "id": 1,
                "text": "HTML",
                "done": false
            },
            {
                "id": 2,
                "text": "CSS",
                "done": false
            },
            {
                "id": 3,
                "text": "Responsive design",
                "done": false
            },
            {
                "id": 4,
                "text": "Javascript",
                "done": false
            }
        ]
    })
});

app.mount('#app');