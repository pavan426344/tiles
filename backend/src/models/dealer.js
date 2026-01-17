const db = require('../config/db');

const Dealer = {
  async findAll() {
    const [rows] = await db.query('SELECT * FROM dealer');
    return rows;
  },

  async findById(id) {
    const [rows] = await db.query('SELECT * FROM dealer WHERE Dealer_Id = ?', [id]);
    return rows[0];
  },

  async create(dealerData) {
    const [result] = await db.query('INSERT INTO dealer SET ?', dealerData);
    return result.insertId;
  },

  async update(id, dealerData) {
    const [result] = await db.query('UPDATE dealer SET ? WHERE Dealer_Id = ?', [dealerData, id]);
    return result;
  },

  async delete(id) {
    const [result] = await db.query('DELETE FROM dealer WHERE Dealer_Id = ?', [id]);
    return result;
  },

  async setStatus(id, status) {
    const [result] = await db.query('UPDATE dealer SET Status = ? WHERE Dealer_Id = ?', [status, id]);
    return result;
  },

  async findByReferUser(userId) {
    const [rows] = await db.query('SELECT * FROM dealer WHERE ReferUser_id = ?', [userId]);
    return rows;
  },

  async findByCity(city) {
    const [rows] = await db.query('SELECT * FROM dealer WHERE City = ?', [city]);
    return rows;
  },
};

module.exports = Dealer;
