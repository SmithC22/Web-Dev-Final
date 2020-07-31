var express = require('express');
var router = express.Router();

const {query} = require("./dbConnection")


router.get("/", function(req, res, next) {
    res.send("words");
})

router.get("/getAllWords", function(req, res, next) {
    query("select * from words", [], (err, result) => {
        res.send(result.rows);
    })
})

router.get("/getQuestionsByType", function(req, res, next) {
    query("select * from words where question_type=$1", [req.query.queston_type], (err, result) => {
        res.send(result.rows);
    })
})
router.get("/getQuestionsByWord", function(req, res, next) {
    query("select * from words where word=$1", [req.query.word], (err, result) => {
        res.send(result.rows);
    })
})

module.exports = router;
