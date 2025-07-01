<template>
    <Navbar/>
    <div class="products">
        <EmployeeList v-for="user in users" :key="user.id" :user="user"/>
    </div>
<!--    <Contact/>-->
</template>

<script>


import EmployeeList from "../Components/EmployeeList.vue";
import Navbar from "../Components/Navbar.vue";
import Contact from "../Components/Contact.vue";

export default {
    name: 'Home',
    components: {
        Contact,
        Navbar,
        EmployeeList
    },
    props: {
        routes: Object
    },
    data() {
        return {
            users: [],
        };
    },
    mounted() {
        this.fetchEmployees();
    },
    methods: {
        fetchEmployees() {

            fetch(`/employeesget`)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log("Fetched users:", data);
                    this.users = data;
                })
                .catch((error) => {
                    console.error("Error fetching users:", error);
                });
        },
    },
};
</script>
