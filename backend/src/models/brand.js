const db = require('../config/db');

const Brand = {
  async findAll() {
    const [rows] = await db.query('SELECT * FROM t_brand');
    return rows;
  },

  async findById(id) {
    const [rows] = await db.query('SELECT * FROM t_brand WHERE T_Brand_Id = ?', [id]);
    return rows[0];
  },

  async create(brandData) {
    const [result] = await db.query('INSERT INTO t_brand SET ?', brandData);
    return result.insertId;
  },

  async update(id, brandData) {
    const [result] = await db.query('UPDATE t_brand SET ? WHERE T_Brand_Id = ?', [brandData, id]);
    return result;
  },

  async delete(id) {
    const [result] = await db.query('DELETE FROM t_brand WHERE T_Brand_Id = ?', [id]);
    return result;
  },
};

module.exports = Brand;
