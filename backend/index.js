const express = require('express');
const cors = require('cors');
const dotenv = require('dotenv');
const authRoutes = require('./src/routes/auth');
const brandRoutes = require('./src/routes/brands');
const dealerRoutes = require('./src/routes/dealers');
const errorMiddleware = require('./src/middleware/errorMiddleware');

dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use('/api/auth', authRoutes);
app.use('/api/brands', brandRoutes);
app.use('/api/dealers', dealerRoutes);

app.use(errorMiddleware);

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});

module.exports = app;
