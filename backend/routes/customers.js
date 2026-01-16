const express = require('express');
const router = express.Router();
const connection = require('../db');

router.get('/', (req, res) => {
  const query = 'SELECT * FROM customer';
  connection.query(query, (error, results) => {
    if (error) {
      return res.status(500).json({ error });
    }
    res.status(200).json(results);
  });
});

module.exports = router;
