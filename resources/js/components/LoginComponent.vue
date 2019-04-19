<template>
    <h1>hey now</h1>
</template>
<script>
  import { Card, Button, FormGroupInput } from '@/components';
  
  export default {
    name: 'login-page',
    bodyClass: 'login-page',
    components: {
      Card,
      [Button.name]: Button,
      [FormGroupInput.name]: FormGroupInput
    }
  }
</script>
<style>
</style>
