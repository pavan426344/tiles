const User = require('../models/user');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcrypt');

exports.login = async (req, res, next) => {
  try {
    const { username, password } = req.body;
    const user = await User.findByUsername(username);

    if (!user) {
      return res.status(404).send({ message: 'No user found.' });
    }

    const passwordIsValid = await bcrypt.compare(password, user.password);

    if (!passwordIsValid) {
      return res.status(401).send({ auth: false, token: null });
    }

    const token = jwt.sign({ id: user.userlogin_id, usertype: user.UserType }, process.env.JWT_SECRET, {
      expiresIn: 86400, // expires in 24 hours
    });

    res.status(200).send({ auth: true, token });
  } catch (err) {
    next(err);
  }
};
