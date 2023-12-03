<script>
import axios from "axios";

export default {
    data() {
        return {
            name: localStorage.getItem("name") || '',
            logged: false,
        };
    },
    methods: {
        checkInUser() {
            axios
                .post("http://192.168.1.217:80/log", { user: this.name })
                .then((res) => {
                    if (res.status == 200) {
                        confirm("You have checked in! \nHave a wonderful day.");
                        localStorage.setItem("name",this.name);
                        localStorage.setItem("logged",true);
                        location.href = "/"
                    } else {
                        confirm(
                            "We couldn't handle your request. \nPlease try again later."
                        );
                    }
                });
        },
    },
};
</script>

<template>
    <div class="">
        <div class="h-full flex justify-items-center pt-10">
            <form
                class="flex-col items-center justify-center w-full ml-4"
                v-on:submit.prevent="checkInUser"
            >
                <div class="mx-auto flex items-center justify-center">
                    <div
                        class="h-36 w-[75%] rounded-md bg-gradient-to-r from-blue-500 via-blue-600 to-blue-900 p-1"
                    >
                        <div class="bg-slate-600 h-full w-full rounded-md">
                            <div class="relative z-0 m-3 group w-[75%]">
                                <input
                                    type="text"
                                    name="user_name"
                                    id="floating_email"
                                    class="block py-2.5 w-full text-sm text-gray-200 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "
                                    v-model="name"
                                    required
                                />
                                <label
                                    for="floating_email"
                                    class="peer-focus:font-medium w-full absolute text-m text-gray-200 dark:text-gray-200 duration-300 transform -translate-y-7 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-gray-200 peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7"
                                    >Enter your full name</label
                                >
                            </div>
                            <button
                                type="submit"
                                class="text-white w-[75%] m-4 bg-blue-700 bottom-0 right-0 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                Check In
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
