const express = require('express');
const cors = require('cors');
const connection = require('./db');

const app = express();
const port = 3001;

app.use(cors());
app.use(express.json());

const authRoutes = require('./routes/auth');
const customerRoutes = require('./routes/customers');

app.get('/', (req, res) => {
  res.send('Hello from the backend!');
});

app.use('/api/auth', authRoutes);
app.use('/api/customers', customerRoutes);

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
