const db = require('../config/db');

const User = {
  async findByUsername(username) {
    const [rows] = await db.query('SELECT * FROM userlogin WHERE User_Name = ?', [username]);
    return rows[0];
  },
  async findById(id) {
    const [rows] = await db.query('SELECT * FROM userlogin WHERE userlogin_id = ?', [id]);
    return rows[0];
  },
};

module.exports = User;
