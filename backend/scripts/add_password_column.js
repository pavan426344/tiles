const db = require('../src/config/db');

const addColumns = async () => {
  try {
    const query = `
      ALTER TABLE userlogin
      ADD COLUMN password VARCHAR(255) NOT NULL,
      ADD COLUMN email VARCHAR(255) UNIQUE;
    `;
    await db.query(query);
    console.log('Columns added successfully.');
  } catch (err) {
    console.error('Error adding columns:', err);
  } finally {
    db.end();
  }
};

addColumns();
