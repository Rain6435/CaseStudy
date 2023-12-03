<script>
import axios from "axios";
import { ref } from "vue";

const users = ref();

export default {
    data() {
        return {
            users: [],
        };
    },
    created() {
        this.sendRequest();
    },
    methods: {
        sendRequest() {
            axios
                .get("http://192.168.1.217:80/users")
                .then((res) => {
                    if (res.status == 200) {
                        this.users = res.data;
                        console.log(this.users[0]);
                    } else {
                        console.log("error fetching data");
                    }
                })
                .then(() => {
                    this.users.forEach((user) => {
                        var time = new Date(user.checked_at);
                        user.checked_at = time.toLocaleTimeString([], {
                            hour: "2-digit",
                            minute: "2-digit",
                        });
                    });
                });
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<template>
    <div class="flex-col m-auto w-max">
        <h1 v-if="users.length != 0"
            class="mb-4 text-center font-extrabold leading-none tracking-tight text-gray-900 text-3xl sm:text-4xl md:text-5xl lg:text-6xl dark:text-white"
        >
            Active Users
        </h1>
        <KeepAlive>
            <div v-if="users.length == 0">
                <h1
                    class="m-4 text-[30px] font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
                >
                    No users in the facily!
                </h1>
            </div>
            <div v-else>
                <table
                    class="w-max p-5 m-5 text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-6 m-5 py-3"></th>
                            <th scope="col" class="px-6 m-5 py-3">Users</th>
                            <th scope="col" class="px-6 m-5 py-3">
                                Check in Time
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <tr v-for="(user, index) in users">
                            <td
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ index + 1 }}
                            </td>
                            <td
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ user.name }}
                            </td>
                            <td
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ user.checked_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </KeepAlive>
    </div>
</template>
