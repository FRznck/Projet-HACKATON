<template>
  <header class="bg-dark text-white text-center py-5">
    <h1>Welcome to our Smart Recruitment Platform</h1>
    <p>Find your dream job or the perfect candidate with ease.</p>
    <router-link to="/LoginRegister" class="btn btn-light">Login</router-link>
    <router-link to="/UserRegistration" class="btn btn-light">Sign Up</router-link>
    
  </header>
</template>

<script>
export default {
  name: 'HeaderComponent'
};
</script>

<style scoped>
header {
  background: #333;
}
</style>