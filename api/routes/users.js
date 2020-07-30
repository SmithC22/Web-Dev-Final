var express = require('express');
var router = express.Router();

const query = require("./dbConnection")

/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

router.get("/getUserById", function(req, res, next) {
  query("select * from users where id = $1", [req.query.id], (err, result) => {
    res.send(result.rows)
  })
})

router.get("/login", function(req, res, next) {
  query("select * from users where username = $1 and password = $2", [req.query.username, req.query.password], (err, result) => {
    res.send(result.rows)
  })
})

router.get("/addUser", function(req, res, next) {
  const userDef = req.body.userDef
  query("insert into users values ($1, $2)", [userDef["username"], userDef["password"]], (err, result) => {
    res.send(result.rows)
  })
})

router.get("/removeUser", function(req, res, next) {
  query("delete from users where id=$1", [req.query.id], (err, result) => {
    res.send(result.rows);
  })
})
module.exports = router;
