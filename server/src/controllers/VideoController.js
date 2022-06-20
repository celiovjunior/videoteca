const Video = require('../models/Video');
const { response } = require('express');

module.exports = {
  async index(request, response) {
    try {
      const videos = await Video.find();

      return response.status(200).json({ videos });

    } catch (err) {

      response.status(500).json({ error: err.message });

    }
  }
};