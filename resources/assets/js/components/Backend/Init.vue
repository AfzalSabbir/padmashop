<template>
    <div>

    </div>
</template>

<script>
    export default {
        props: {
          auth_id: {
              type: Number
          },
          domain: {
              type: String
          }
        },
        mounted() {
            this.$store.commit('setAuth', this.auth_id);
            this.$store.commit('setUrl', {
                our_domain: this.domain
            });
        }
    }
</script>
