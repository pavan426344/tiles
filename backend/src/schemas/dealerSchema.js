const Joi = require('joi');

const dealerSchema = Joi.object({
  company_name: Joi.string().required(),
  name: Joi.string().required(),
  address: Joi.string().required(),
  city: Joi.string().required(),
  state: Joi.string().required(),
  country: Joi.string().required(),
  pincode: Joi.string().required(),
  email: Joi.string().email().required(),
  phone: Joi.string().required(),
  mobile: Joi.string().required(),
  fax: Joi.string().allow('').optional(),
  website: Joi.string().uri().allow('').optional(),
  tan: Joi.string().allow('').optional(),
  vat: Joi.string().allow('').optional(),
  excise: Joi.string().allow('').optional(),
  commission_rate: Joi.number().allow(null).optional(),
  annual_turnover: Joi.number().allow(null).optional(),
  bank_name: Joi.string().allow('').optional(),
  acc_no: Joi.string().allow('').optional(),
  branch: Joi.string().allow('').optional(),
  ifci: Joi.string().allow('').optional(),
  refer_user_id: Joi.number().required(),
  status: Joi.number().required(),
});

module.exports = dealerSchema;
