<template>
    <section id="productdetails" v-if="user">
        <div class="w-full md:w-2/5">
            <img :src="user.employee.image || placeholderImage" class="w-full h-64 object-cover rounded-lg shadow-md" id="MainImg" alt="Employee image">
            <div class="grid grid-cols-4 gap-2 mt-4">
                <div v-for="i in 4" :key="i">
                    <img :src="user.employee.image || placeholderImage" class="w-full h-16 object-cover rounded-md shadow-sm" alt="Employee thumbnail">
                </div>
            </div>
        </div>

        <div class="w-full md:w-3/5">
            <h2 class="text-2xl font-bold mb-4">{{ user.employee.username }}</h2>

            <div class="mb-6">
                <p class="text-lg"><span class="font-semibold">Total Hours:</span> {{ calculateTotalHours() }}</p>
                <p class="text-lg"><span class="font-semibold">Most Recent Date:</span> {{ getMostRecentDate() }}</p>
            </div>

            <h3 class="text-xl font-semibold mb-3">Attendance Records</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">Datums</th>
                        <th class="p-2 border">Stundas kopā</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="row in user.attendance" :key="row.date">
                        <td class="p-2 border">{{ row.date }}</td>
                        <td class="p-2 border">{{ row.total_hours }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <p v-else class="text-center p-8">Loading user details...</p>
</template>

<script>
export default {
    props: {
        user: Object
    },
    methods: {
        calculateTotalHours() {
            if (!this.user?.attendance) return 0;
            return this.user.attendance.reduce((total, record) => total + record.total_hours, 0);
        },
        getMostRecentDate() {
            return this.user?.attendance?.[0]?.date || 'No records';
        }
    }
};
</script>


<style scoped>

/* product */
#productdetails {
    display: flex;
    margin-top: 110px;
    margin-bottom: 110px;
    justify-content: center;
    align-items: center;
    width: 80%;
    max-width: 1200px;
    padding: 50px;
    box-sizing: border-box;
    /* left: 100px; */
    left: 15%;
    position: relative;
}

.single-pro-image {
    justify-content: center;
    align-items: center;
}

#productdetails .single-pro-image{
    width: 40%;
    margin-right: 50px;
}

.small-image-group {
    display: flex;
    justify-content: space-between;
}

.small-img-col {
    flex-basis: 24%;
    cursor: pointer;
}

#productdetails .single-pro-details {
    width: 50%;
    padding-top: 30px;
}

#productdetails .single-pro-details h4 {
    padding: 40px 0 20px 0;
    font-weight: 700;
}

#productdetails .single-pro-details h2 {
    font-size: 26px;
    font-weight: 700;
}

#productdetails .single-pro-details select {
    display: block;
    padding: 5px 10px;
    margin-bottom: 10px;
}

#productdetails .single-pro-details input {
    width: 50px;
    height: 47px;
    padding-left: 10px;
    font-size: 16px;
    margin-right: 10px;
}

#productdetails .single-pro-details button {
    background-color: #7a3a7b;
    color: #e8e8e8;
    border-radius: 5px;
    padding: 5px 15px;
}

#productdetails .single-pro-details input:focus {
    outline: none;
}

#productdetails .single-pro-details span {
    line-height: 25px;
}

.gcardt {
    animation: animt 5s ease-in-out infinite;
}

@keyframes animt {
    0% {
        color: #9a73a1;
    }

    50% {
        color: #8b2c84;
    }

    100% {
        color: #5c0a55;
    }
}

/* product */


/* product */
@media (max-width: 768px) {
    #productdetails {
        display: flex;
        flex-direction: column;
    }

    #productdetails .single-pro-image {
        width: 100%;
        margin-right: 0px;
    }

    #productdetails .single-pro-details {
        width: 100%;
    }
}

/* product */
</style>
