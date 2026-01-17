const express = require('express');
const router = express.Router();
const brandController = require('../controllers/brandController');
const authMiddleware = require('../middleware/authMiddleware');
const authorizationMiddleware = require('../middleware/authorizationMiddleware');
const validationMiddleware = require('../middleware/validationMiddleware');
const brandSchema = require('../schemas/brandSchema');

router.get('/', [authMiddleware], brandController.getAllBrands);
router.get('/:id', [authMiddleware], brandController.getBrandById);
router.post('/', [authMiddleware, authorizationMiddleware('group_master'), validationMiddleware(brandSchema)], brandController.createBrand);
router.put('/:id', [authMiddleware, authorizationMiddleware('group_master'), validationMiddleware(brandSchema)], brandController.updateBrand);
router.delete('/:id', [authMiddleware, authorizationMiddleware('group_master')], brandController.deleteBrand);

module.exports = router;
