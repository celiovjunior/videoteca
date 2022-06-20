const express = require('express');

const routes = express.Router();

const VideoController = require('./controllers/VideoController')

routes.get('/', (req, res) => {
  res.send("Hello world!")
})

routes.get('/videos', VideoController.index)

module.exports = routes;