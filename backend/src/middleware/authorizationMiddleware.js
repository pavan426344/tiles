const authorize = (permission) => (req, res, next) => {
  const { usertype, permissions } = req.user;

  if (usertype === 4 || usertype === 5) {
    // Admins and Super Admins have all permissions
    return next();
  }

  if (permissions && permissions[permission] === 1) {
    return next();
  }

  res.status(403).send({ message: 'You do not have permission to perform this action.' });
};

module.exports = authorize;
