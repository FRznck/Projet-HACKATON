<template>
  <div>
    <HeaderComponent />
    <FeaturedOffers />
    <LoginRegister />
    <UserRegistration />
    <PremiumFeatures />
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from './components/Header.vue';
import FeaturedOffers from './components/FeaturedOffers.vue';
import LoginRegister from './components/LoginRegister.vue';
import UserRegistration from './components/UserRegistration.vue';
import PremiumFeatures from './components/PremiumFeatures.vue';
import FooterComponent from './components/Footer.vue';

export default {
  components: {
    HeaderComponent,
    FeaturedOffers,
    LoginRegister,
    UserRegistration,
    PremiumFeatures,
    FooterComponent
  }
};
</script>