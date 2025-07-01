<template>

    <div class="product-cards">
        <div class="product-card">
            <p>ID -> {{ user.id }}</p>
            <h5>Name -> {{ user.username }}</h5>
            <button  @click="goToUserPage(user.id)">Inspect</button>
        </div>
    </div>

</template>

<script>

export default {
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    methods: {
        goToUserPage(userID) {

            if (!userID) {
                console.error('userID ID is missing!');
                return;
            }
            console.log(userID);
            window.location.href = `/user?id=${userID}`;

        },
    },

};
</script>

<style scoped>
.product-card {
    margin: 10px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
}
.product-cards {
    display: flex;
    justify-content: space-between;
    margin: 20px auto;
    width: 900px;
    gap: 20px;
    flex-wrap: wrap;
    position: relative;
}

.product-card{
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 15px;
    width: 23%;
    text-align: center;
    align-items: center;
    justify-content: center;
    padding: 15px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    flex: 1 1 calc(50% - 10px); /* Каждая карточка занимает 50% ширины с небольшим отступом */
    margin-bottom: 50px; /* Отступ между карточками */
    flex-direction: column; /* Ensures the image and text stack */
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product-card img {
    max-width: 100%;
    height: fit-content;
    border-radius: 10px;

    /* Center the image */
    display: block;
    margin: 0 auto; /* Horizontally centers the image */
}

.product-img {
    align-self: center;
}

.product-card p {
    font-size: 0.9em;
    color: #666;
    margin: 10px 0;
}

.product-card button {
    padding: 10px 20px;
    background-color: #66008f;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.product-card button:hover {
    background-color: #381473;
}


/* Media query foor screens 950px or lesss */
@media (max-width: 950px) {
    .product-card {
        flex: 1 1 calc(50% - 5px);
        margin-bottom: 15px;
    }

    .product-cards {
        display: flex;
        justify-content: space-between;
        margin: 20px auto;
        width: auto;
        gap: 20px;
        flex-wrap: wrap;
        position: relative;
    }
}

@media (min-width: 1090px) {
    .product-cards {
        display: flex;
        justify-content: space-between;
        margin: 20px auto;
        width: 500px;
        gap: 20px;
        flex-wrap: wrap;
        position: relative;
    }
}
/* Cards near footer */
</style>
