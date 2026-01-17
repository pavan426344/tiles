const db = require('../src/config/db');
const bcrypt = require('bcrypt');

const hashPasswords = async () => {
  try {
    const [users] = await db.query('SELECT userlogin_id, Pass_Word FROM userlogin');

    for (const user of users) {
      const hashedPassword = await bcrypt.hash(user.Pass_Word, 10);
      await db.query('UPDATE userlogin SET password = ? WHERE userlogin_id = ?', [hashedPassword, user.userlogin_id]);
    }

    console.log('Passwords hashed successfully.');
  } catch (err) {
    console.error('Error hashing passwords:', err);
  } finally {
    db.end();
  }
};

hashPasswords();
