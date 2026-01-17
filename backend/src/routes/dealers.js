const express = require('express');
const router = express.Router();
const dealerController = require('../controllers/dealerController');
const authMiddleware = require('../middleware/authMiddleware');
const authorizationMiddleware = require('../middleware/authorizationMiddleware');
const validationMiddleware = require('../middleware/validationMiddleware');
const dealerSchema = require('../schemas/dealerSchema');
const dealerStatusSchema = require('../schemas/dealerStatusSchema');

router.get('/', [authMiddleware], dealerController.getAllDealers);
router.get('/:id', [authMiddleware], dealerController.getDealerById);
router.post('/', [authMiddleware, authorizationMiddleware('dealer_master'), validationMiddleware(dealerSchema)], dealerController.createDealer);
router.put('/:id', [authMiddleware, authorizationMiddleware('dealer_master'), validationMiddleware(dealerSchema)], dealerController.updateDealer);
router.delete('/:id', [authMiddleware, authorizationMiddleware('dealer_master')], dealerController.deleteDealer);
router.put('/status/:id', [authMiddleware, authorizationMiddleware('dealer_master'), validationMiddleware(dealerStatusSchema)], dealerController.setDealerStatus);
router.get('/user/:userId', [authMiddleware], dealerController.getDealersByReferUser);
router.get('/city/:city', [authMiddleware], dealerController.getDealersByCity);

module.exports = router;
