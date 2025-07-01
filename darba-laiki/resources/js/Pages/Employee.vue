<template>
    <Navbar/>
    <div class="main-container">

        <EmployeeCard :user="selectedUser"/>
    </div>
    <div class="mt-4">
        <Link href="/" class="text-blue-600 hover:underline">⬅ Atpakaļ uz sarakstu</Link>
    </div>
</template>

<script>

import EmployeeCard from "../Components/EmployeeCard.vue";
import Navbar from "../Components/Navbar.vue";

export default {
    components: {
        Navbar,
        EmployeeCard

    },
    props: {
        routes: Object,
        user: {
            type: Object,
            required: true
        },
        userID: {
            type: [String, Number],
            required: true
        }
    },
    data() {
        return {
            selectedUser: null, // Store the selected product data here
            // routes: {}  // Assuming you have some routing data
        };
    },
    mounted() {
        const userID = this.$props.userID || null;
        console.log('userID :', userID);
        // this.fetchEmployeeDetails(userID);

        if (userID) {
            this.fetchEmployeeDetails(userID);
        } else {
            console.error('Product ID not found in query parameters.');
        }
    },
    methods: {
        fetchEmployeeDetails(userID) {
            fetch(`/employees/${userID}`)
                .then((response) => response.json())
                .then((data) => {
                    this.selectedUser = data;
                    console.log('Fetched user:', this.selectedUser);
                })
                .catch((error) => {
                    console.error('Error fetching user details:', error);
                });
        }
    }
}
</script>

<style scoped>
.main-container {
    display: flex;
    flex-direction: column;
    gap: 70px; /* Adjust as needed */
}
</style>
