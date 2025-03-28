<template>
    <section class="container my-5">
      <h2 class="text-center">Featured Offers</h2>
      <div class="row">
        <div class="col-md-4" v-for="(offer, index) in offers" :key="index">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ offer.title }}</h5>
              <p class="card-text">{{ offer.description }}</p>
              <span class="badge bg-secondary" v-for="tag in offer.tags" :key="tag">{{ tag }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: 'FeaturedOffers',
    data() {
      return {
        offers: [
          { title: 'Senior Software Engineer', description: 'Join a dynamic tech team and work on cutting-edge...', tags: ['Full-time', 'Remote'] },
          { title: 'Marketing Specialist', description: 'Create impactful marketing campaigns for...', tags: ['Part-time'] },
          { title: 'Human Resources Manager', description: 'Lead talent acquisition strategies for a growing c...', tags: ['Full-time'] }
        ]
      };
    }
  };
  </script>