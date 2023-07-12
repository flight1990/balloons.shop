<template>
    <h1>{{ category ? 'Edit' : 'Create' }} Category</h1>
</template>

<script>

export default {
    name: "Modify",
    props: {
        category: {
            type: Object,
            required: false
        }
    }
}
</script>
