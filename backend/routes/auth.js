const express = require('express');
const router = express.Router();
const bcrypt = require('bcrypt');
const connection = require('../db');

const saltRounds = 10;

router.post('/register', async (req, res) => {
  const { username, password } = req.body;

  if (!username || !password) {
    return res.status(400).json({ message: 'Username and password are required' });
  }

  try {
    const hashedPassword = await bcrypt.hash(password, saltRounds);
    const query = 'INSERT INTO userlogin (User_Name, Pass_Word, Status) VALUES (?, ?, ?)';
    connection.query(query, [username, hashedPassword, 1], (error, results) => {
      if (error) {
        return res.status(500).json({ error });
      }
      res.status(201).json({ message: 'User registered successfully' });
    });
  } catch (error) {
    res.status(500).json({ error });
  }
});

router.post('/login', (req, res) => {
  const { username, password } = req.body;

  if (!username || !password) {
    return res.status(400).json({ message: 'Username and password are required' });
  }

  const query = 'SELECT * FROM userlogin WHERE User_Name = ?';
  connection.query(query, [username], async (error, results) => {
    if (error) {
      return res.status(500).json({ error });
    }

    if (results.length > 0) {
      const user = results[0];
      const match = await bcrypt.compare(password, user.Pass_Word);
      if (match) {
        res.status(200).json({ message: 'Login successful' });
      } else {
        res.status(401).json({ message: 'Invalid credentials' });
      }
    } else {
      res.status(401).json({ message: 'Invalid credentials' });
    }
  });
});

module.exports = router;
