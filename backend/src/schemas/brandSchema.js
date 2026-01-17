const Joi = require('joi');

const brandSchema = Joi.object({
  brand_name: Joi.string().required(),
});

module.exports = brandSchema;
