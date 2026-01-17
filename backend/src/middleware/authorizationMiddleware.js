const ProfileSetting = require('../models/profileSetting');
const User = require('../models/user');

const authorize = (permission) => async (req, res, next) => {
  try {
    const user = await User.findById(req.userId);

    if (!user) {
      return res.status(404).send({ message: 'No user found.' });
    }

    if (user.UserType === 4 || user.UserType === 5) {
      // Admins and Super Admins have all permissions
      return next();
    }

    const profile = await ProfileSetting.findByUsername(user.User_Name);

    if (!profile) {
      return res.status(403).send({ message: 'You do not have permission to perform this action.' });
    }

    if (profile[permission] === 1) {
      next();
    } else {
      res.status(403).send({ message: 'You do not have permission to perform this action.' });
    }
  } catch (err) {
    next(err);
  }
};

module.exports = authorize;
