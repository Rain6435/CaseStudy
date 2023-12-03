<script>
export default {
    data() {
        return {
            value: localStorage.getItem("logged") ? "Check Out" : "Check In",
        };
    },
};
</script>
<template>
    <nav
        class="font-sans flex flex-row gap-5 justify-center text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full"
    >
        <div class="mb-2 sm:mb-0">
            <RouterLink
                to="/main"
                class="text-2xl no-underline text-blue-800 font-extrabold hover:text-blue-dark"
                >{{ this.value }}</RouterLink
            >
        </div>
        <div>
            <RouterLink
                to="/activeUsers"
                class="text-2xl no-underline font-extrabold text-grey-darkest hover:text-blue-dark"
                >Active Users</RouterLink
            >
        </div>
    </nav>
    <div>
        <RouterView></RouterView>
    </div>
</template>
