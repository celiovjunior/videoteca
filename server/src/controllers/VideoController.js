const Video = require('../models/Video');
const { v4: uuid } = require('uuid');
const { response } = require('express');

module.exports = {
  async index(request, response) {
    try {
      const videos = await Video.find();

      return response.status(200).json({ videos });

    } catch (err) {

      response.status(500).json({ error: err.message });

    }
  },

  async store(request, response) {
    const { title, link } = request.body;

    if(!title || !link) {
      return response.status(400).json({ error: "Missing title or link" })
    }
    
    const video = new Video({
      _id: uuid(),
      title,
      link,
      liked: false
    })

    try {
      await video.save();
      
      return response.status(201).json({ message: "Video added succesfully" })

    } catch (err) {

      response.status(400).json({ error: err.message });

    }
  },

  async update(request, response) {  
    try {
      const { id } = request.params;
      const { title, link } = request.body;
  
      const video = await Video.findById(id);
  
      if(!video) {
        return response.status(404).json();
      }
  
      await video.updateOne({ title, link })
  
      return response.status(200).json();

    } catch (error) {
      response.status(500).json({ error: err.message })
    }
  }

};