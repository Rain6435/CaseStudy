<script>
import axios from "axios";
import CheckIn from "./CheckIn.vue";
import CheckOut from "./CheckOut.vue";

export default {
    data() {
        return {
            isLoggedIn: false,
        };
    },
    methods: {
        checkIfInActive() {
            axios.get("http://127.0.0.1:8000/logged").then((res) => {
                if (res.status == 201) {
                    this.isLoggedIn = true;
                }else{
                    localStorage.setItem("signedCheckin", res.data);
                }
            });
        },
        checkOut() {
            axios.post("http://127.0.0.1:8000/checkout").then((res) => {
                if (res.status == 201) {
                    this.isLoggedIn = false;
                    localStorage.removeItem("logged");
                    localStorage.removeItem("signedCheckin")
                    confirm(
                        "You have checked out successfully!\nHoping to see you soon."
                    );
                    location.href = "/";
                }
            });
        },
    },
    created() {
        this.checkIfInActive();
    },
    components: {
        CheckIn,
        CheckOut,
    },
};
</script>

<template>
    <div>
        <div class="">
            <div
                class="h-max flex-col portrait:mt-[10%] mt-[5%] items-center justify-center"
            >
                <div class="text-blue-50 flex items-center justify-center ml-3">
                    <h1
                        class="mb-4 text-[80px] font-extrabold leading-none tracking-tight text-gray-900 md:text-6xl lg:text-6xl dark:text-white"
                    >
                        Check in/Check out
                    </h1>
                </div>
                <div v-if="!isLoggedIn">
                    <CheckIn />
                </div>
                <div v-else>
                    <CheckOut @click="checkOut()" />
                </div>
            </div>
        </div>
    </div>
</template>
