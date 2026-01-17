const Brand = require('../models/brand');

exports.getAllBrands = async (req, res, next) => {
  try {
    const brands = await Brand.findAll();
    res.status(200).send(brands);
  } catch (err) {
    next(err);
  }
};

exports.getBrandById = async (req, res, next) => {
  try {
    const brand = await Brand.findById(req.params.id);
    if (!brand) {
      return res.status(404).send({ message: 'No brand found.' });
    }
    res.status(200).send(brand);
  } catch (err) {
    next(err);
  }
};

exports.createBrand = async (req, res, next) => {
  try {
    const newBrand = {
      T_Brand_Name: req.body.brand_name,
      C_Date: new Date(),
    };
    const brandId = await Brand.create(newBrand);
    res.status(201).send({ id: brandId, ...newBrand });
  } catch (err) {
    next(err);
  }
};

exports.updateBrand = async (req, res, next) => {
  try {
    const updatedBrand = {
      T_Brand_Name: req.body.brand_name,
    };
    await Brand.update(req.params.id, updatedBrand);
    res.status(200).send({ message: 'Brand updated successfully.' });
  } catch (err) {
    next(err);
  }
};

exports.deleteBrand = async (req, res, next) => {
  try {
    await Brand.delete(req.params.id);
    res.status(200).send({ message: 'Brand deleted successfully.' });
  } catch (err) {
    next(err);
  }
};
