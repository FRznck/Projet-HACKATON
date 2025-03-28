<template>
    <section class="container my-5">
      <h2 class="text-center">User Registration</h2>
      <form class="text-center">
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Enter your password">
        </div>
        <div class="mb-3">
          <button class="btn btn-dark">Create Account</button>
        </div>
      </form>
    </section>
  </template>
  
  <script>
  export default {
    name: 'UserRegistration'
  };
  </script>