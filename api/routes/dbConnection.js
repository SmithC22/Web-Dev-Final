const {Pool} = require("pg");

const pool = new Pool(
    {
        connectionString:"postgres://oqbwjdudebjaxq:d204c2e4a5d984f46dffd80bad4ecf278bb48782d70bc45f60ea3857ec3e9413@ec2-50-19-26-235.compute-1.amazonaws.com:5432/dddebn6lk5nvph",
    }
)
module.exports = {
    query(text, params, callback) {
        return pool.query(text, params, callback);
    }
}