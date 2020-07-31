var express = require('express');
var router = express.Router();

const query = require("./dbConnection")

router.get("/", function(req, res, next) {
    res.send("sounds");
})
router.get("/getAllSounds", function(req, res, next) {
    query("select * from sounds", [], (err, result) => {
        res.send(result.rows)
    })
})
router.get("/getSoundsByType", function(req, res, next) {
    query("select * from sounds where type=$1", [req.query.type], (err, result) => {
        res.send(result.rows)
    })
})

router.get("/getSoundsByCorrect", function(req, res, next) {
    query("select * from sounds where correct=$1", [req.query.correct], (err, result) => {
        res.send(result.rows)
    })
})

router.get("/getSoundsByWordId", function(req, res, next) {
    query("select * from sounds where word_id=$1", [req.query.word_id], (err, result) => {
        res.send(result.rows)
    })
})

module.exports = router;