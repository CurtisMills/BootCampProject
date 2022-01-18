<template>
    <ul>
        <li v-for="question in questions">{{ question.question }}</li>
    </ul>
</template>

<script>
import AnswerQuestions from "./AnswerQuestions";
export default {
    name: "AnswerQuestions",
    components: AnswerQuestions,
    props: {
        questions: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            questions: [],
        };
    },
    mounted() {
        this.loadQuestions();
    },
    methods: {
        loadQuestions() {
            window.axios
                .get("/api/questions")
                .then((response) => this.onQuestionsLoaded(response))
                .catch((error) => alert("Could not load Questions."))
                .then(() => console.log("Always Callback"));
        },

        onQuestionsLoaded(response) {
            this.questions = response.data.data;
        },
    },
};
</script>
