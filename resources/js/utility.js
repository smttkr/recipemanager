var processingMixin = {
  data() {
    return {
      processing: false,
    };
  },
  methods: {
    startProcessing() {
      this.processing = true;
    },
    endProcessing() {
      this.processing = false;
    },
  },
};