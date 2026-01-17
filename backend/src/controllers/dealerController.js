const Dealer = require('../models/dealer');

const toPascalCase = (obj) => {
  const newObj = {};
  for (const key in obj) {
    if (Object.prototype.hasOwnProperty.call(obj, key)) {
      const newKey = key.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join('_');
      newObj[newKey] = obj[key];
    }
  }
  return newObj;
};


exports.getAllDealers = async (req, res, next) => {
  try {
    const dealers = await Dealer.findAll();
    res.status(200).send(dealers);
  } catch (err) {
    next(err);
  }
};

exports.getDealerById = async (req, res, next) => {
  try {
    const dealer = await Dealer.findById(req.params.id);
    if (!dealer) {
      return res.status(404).send({ message: 'No dealer found.' });
    }
    res.status(200).send(dealer);
  } catch (err) {
    next(err);
  }
};

exports.createDealer = async (req, res, next) => {
  try {
    const newDealerData = toPascalCase(req.body);
    newDealerData.DateOfRegistration = new Date();
    const dealerId = await Dealer.create(newDealerData);
    const newDealer = { Dealer_Id: dealerId, ...newDealerData };
    res.status(201).send(newDealer);
  } catch (err) {
    next(err);
  }
};

exports.updateDealer = async (req, res, next) => {
  try {
    const updatedDealerData = toPascalCase(req.body);
    await Dealer.update(req.params.id, updatedDealerData);
    const updatedDealer = { Dealer_Id: req.params.id, ...updatedDealerData };
    res.status(200).send(updatedDealer);
  } catch (err) {
    next(err);
  }
};

exports.deleteDealer = async (req, res, next) => {
  try {
    await Dealer.delete(req.params.id);
    res.status(200).send({ message: 'Dealer deleted successfully.' });
  } catch (err) {
    next(err);
  }
};

exports.setDealerStatus = async (req, res, next) => {
  try {
    await Dealer.setStatus(req.params.id, req.body.status);
    res.status(200).send({ message: 'Dealer status updated successfully.' });
  } catch (err) {
    next(err);
  }
};

exports.getDealersByReferUser = async (req, res, next) => {
  try {
    const dealers = await Dealer.findByReferUser(req.params.userId);
    res.status(200).send(dealers);
  } catch (err) {
    next(err);
  }
};

exports.getDealersByCity = async (req, res, next) => {
  try {
    const dealers = await Dealer.findByCity(req.params.city);
    res.status(200).send(dealers);
  } catch (err) {
    next(err);
  }
};
