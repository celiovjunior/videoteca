const express = require('express');
const routes = require('./routes');
const connectToDatabase = require('./database');
const cors = require('cors');
require("dotenv").config();

connectToDatabase();

const app = express();

const port = 3333;
app.use(cors());
app.use(express.json());
app.use(routes);

app.listen(3333, () => {
  console.log(`🔌 Server is running at http://localhost:${port}`)
})