const mongoose = require('mongoose');

const videoSchema = new mongoose.Schema(
  {
    _id: {
      type: String,
      required: true
    },

    title: {
      type: String,
      required: true
    }
  }
)