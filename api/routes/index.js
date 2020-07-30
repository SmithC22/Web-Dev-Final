var express = require('express');
const {query} = require("./dbConnection");

var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.sendFile(__dirname + '/index.html');
});

router.get("/getAllPhrases", function(req, res, next) {
  query("select * from phrases", [], (err, result) =>  {
    res.send(result.rows);
  })
})

router.get("/getAllPhonetic", function(req, res, next) {
  query("select * from phrases where question_type='phonetic'", [], (err, result) => {
    res.send(result.rows);
  })
})
router.get("/getAllComparisons", function(req, res, next) {
  query("select * from phrases where question_type='comparison'", [], (err, result) => {
    res.send(result.rows)
  })
})
router.get("/getPhraseById", function(req, res, next) { 
  query("select * from phrases where id=$1", [req.query.id], (err, result) => {
    res.send(result.rows)
  })
});

router.get("/getPhraseByRegion", function(req, res, next) {
  query("select * from phrases where region=$1", [req.query.region], (err, result) => {
    res.send(result.rows)
  })
})

router.get("/getPhraseByWordContained", function(req, res, next) {
  query("select * from phrases where contains_word=$1", [req.query.contains_word], (err, result) => {
    res.send(result.rows)
  })
})

router.post("/addPhrase", function(req, res, next) {
  const phraseDef = req.body;
  query("insert into phrases values ($1, $2, $3, $4", [phraseDef["phrase"], phraseDef["contains_word"], phraseDef["file_name"], phraseDef["region"]],
    (err, result) => {
      if(err) {
        console.log("THERE HAS BEEN AN ERROR")
        console.log(err)
        res.send("There has been an error")
      }
      else{
        res.send("OK")
      }
  })
})

router.get("/removePhrase", function(req, res, next) {
  query("delete from phrases where id=$1", [req.query.id], (err, result) => {
    res.send(result.rows)
  })
})


module.exports = router;
