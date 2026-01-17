const Joi = require('joi');

const dealerStatusSchema = Joi.object({
  status: Joi.number().required(),
});

module.exports = dealerStatusSchema;
