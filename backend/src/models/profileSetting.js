const db = require('../config/db');

const ProfileSetting = {
  async findByUsername(username) {
    const [rows] = await db.query('SELECT * FROM profilesetting WHERE User_Name = ?', [username]);
    return rows[0];
  },
};

module.exports = ProfileSetting;
