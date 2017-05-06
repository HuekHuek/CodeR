<template lang="html">
	<div class="chat-log">
		<chat-message v-for="message in messages" v-bind:message="message"></chat-message>
        <div class="empty" v-show="messages.length === 0">
            Nothing!
        </div>
	</div>
</template>

<script>
	export default {
        props: ['messages']
    }
</script>

<style>
    .chat-log .chat-message:nth-child(even) {
        background-color: #ccc;
    }

    .empty {
        padding: 1em;
        text-align: center;
    }
</style>